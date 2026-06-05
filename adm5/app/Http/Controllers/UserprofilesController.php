<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User_Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserprofilesController extends Controller
{
    public function indexAll()
    {
        $profiles = User_Profile::all();
        return view('User_accounts.show')->with('profiles', $profiles);
    }

    public function createUser()
    {
        return view('User_accounts.create');
    }

    public function storeUserDetails(Request $request)
    {
        $request->validate([
            'Firstname' => 'required',
            'Lastname' => 'required',
            'Employee_number'=>'required|unique:user_profiles',
            'National_ID' => 'required',
            'Date_of_birth' => 'required',
            'Gender' => 'required',
            'Marital_status' => 'required',
            'Nationality' => 'required',
            'Religion' => 'required',
            'Disability' => 'required',
            'Telephone' => 'required|min:10|max:13',
            'Email' => 'required|email|unique:user_profiles',
            'Home_address' => 'required',
            'County' => 'required',
            'Subcounty' => 'required',
            'Constituency' => 'required',
            'Programme' => 'required',
            'is_Admin' =>'required'
        ]);

        // return $request->all();
        $user = new User;
        $user->name = $request->input('Firstname');
        $user->email = $request->input('Email');
        $user->username = $request->input('Employee_number');
        $user->is_Admin= $request->input('is_Admin');
        // $user->is_Admin = 0;
        $user->password = Hash::make($request->input('Telephone'));
        $user->save();

        $profile = new User_profile;
        $profile->user_id = $user->id;
        $profile->Firstname = $request->input('Firstname');
        $profile->Lastname = $request->input('Lastname');
        $profile->Employee_number= $request->input('Employee_number');
        $profile->National_ID = $request->input('National_ID');
        $profile->Date_of_birth = $request->input('Date_of_birth');
        $profile->Gender = $request->input('Gender');
        $profile->Marital_status = $request->input('Marital_status');
        $profile->Nationality = $request->input('Nationality');
        $profile->Religion = $request->input('Religion');
        $profile->Disability = $request->input('Disability');
        $profile->Telephone = $request->input('Telephone');
        $profile->Email = $request->input('Email');
        $profile->Home_address = $request->input('Home_address');
        $profile->County = $request->input('County');
        $profile->Subcounty = $request->input('Subcounty');
        $profile->Constituency = $request->input('Constituency');
        $profile->Programme = $request->input('Programme');
        $profile->is_Admin= $request->input('is_Admin');
        $profile->save();

        return redirect()->route('dashboard')->with('success', 'Account created successfully');
    }

    //edit
    public function editUserDetails($id)
    {
        $profile = User_Profile::find($id);
        return view('User_accounts.edit_details')->with('profile', $profile);
    }
    //update
    public function updateUserDetails(Request $request, $id)
    {

        $request->validate([
            'Firstname' => 'required',
            'Lastname' => 'required',
            'National_ID' => 'required',
            'Date_of_birth' => 'required',
            'Gender' => 'required',
            'Marital_status' => 'required',
            'Nationality' => 'required',
            'Religion' => 'required',
            'Disability' => 'required',
            'Telephone' => 'required|min:10|max:13',
            'Email' => 'required|email|unique:user_profiles,Email,' . $id . ',id',
            'Home_address' => 'required',
            'County' => 'required',
            'Subcounty' => 'required',
            'Constituency' => 'required',
            'Programme' => 'required',
            // 'is_Admin' =>'required'
        ]);

        $profile = User_profile::find($id);
        $profile->Firstname = $request->input('Firstname');
        $profile->Lastname = $request->input('Lastname');
        $profile->National_ID = $request->input('National_ID');
        $profile->Date_of_birth = $request->input('Date_of_birth');
        $profile->Gender = $request->input('Gender');
        $profile->Marital_status = $request->input('Marital_status');
        $profile->Nationality = $request->input('Nationality');
        $profile->Religion = $request->input('Religion');
        $profile->Disability = $request->input('Disability');
        $profile->Telephone = $request->input('Telephone');
        $profile->Email = $request->input('Email');
        $profile->Home_address = $request->input('Home_address');
        $profile->County = $request->input('County');
        $profile->Subcounty = $request->input('Subcounty');
        $profile->Constituency = $request->input('Constituency');
        $profile->Programme = $request->input('Programme');
        $profile->save();

        User::where('id', $profile->user_id)->update([
            'email' => $request->input('Email'),
            'name' => $request->input('Firstname')
        ]);


        return redirect()->route('show')->with('success', 'Account updated successfully');
    }

    public function showuserDetails($id)
    {
        //
    }

    //delete
    public function deleteUserDetails($id)
    {
        $profiles = User_Profile::find($id);

        User::where('id', $profiles->user_id)->delete();

        $profiles->delete();
        return back()->with('success', 'User deleted successfully');
    }

    //Admin profile information
    public function profileShowAdmin()
    {
        $user= Auth::User();
        $profile= $user->user_profiles;
        return view('User_accounts.profile_show_admin')->with('profiles', $profile);
    }

        //Admin profile information
    public function profileShowUser()
    {
        $user= Auth::User();
        $profile= $user->user_profiles;
        return view('User_accounts.profile_show_user')->with('profiles', $profile);
    }
}

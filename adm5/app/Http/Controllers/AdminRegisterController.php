<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminRegisterController extends Controller
{
    //
    public function adminAccount()
    {
        return view('auth.register');
    }

    public function registerAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'Username' => 'required',
            'password'=>'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation'=>'required|string|min:6'
        ]);

        // return $request->all();
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->Username = $request->input('Username');
        $user->is_Admin = 1;
        $user->password= Hash::make($request['password']);
        $user->save();
        return redirect()->route('homepage')->with('success', 'Account created successfully');
}

}

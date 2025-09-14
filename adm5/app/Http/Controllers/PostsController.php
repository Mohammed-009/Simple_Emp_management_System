<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Post::all();
        return view('Actions.registered')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Actions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'profile_pic'=>'image|nullable|max:1999',
            'firstname'=>'required',
            'lastname'=>'required',
            'phonenumber'=>'required|min:10|max:13',
            'emergencycontact'=>'required',
            'email'=>'required|email|unique:posts',
            'department'=>'required',
            'employeeId'=>'required|unique:posts',
            'positiontitle'=>'required',
            'Level'=>'required',
            'employmenttype'=>'required',
            'birthdate'=>'required',
            'citizenship'=>'required',
            'salary'=>'required',
            'startdate'=>'required',
            'gender'=>'required'
            
        ]);
        // return $request->all();
        //Handle file upload
        if($request->hasFile('profile_pic')) {
            //Get filename with extension
            $filenameWithExt= $request->file('profile_pic')->getClientOriginalName();
            //Get just filename
            $filename= pathInfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension= $request->file('profile_pic')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //Upload image
            $path= $request->file('profile_pic')->storeAs('public/uploaded_images', $fileNameToStore);
            }
            else {
                $fileNameToStore= 'noimage.jpeg';
            }    
        
        //register new employee
        $post= new Post();
        $post->firstname= $request->input('firstname');
        $post->lastname= $request->input('lastname');
        // if($request->hasFile('profile_pic')){
            $post->profile_pic =$fileNameToStore;
        // }
        $post->phonenumber= $request->input('phonenumber');
        $post->emergencycontact= $request->input('emergencycontact');
        $post->email= $request->input('email');
        $post->department= $request->input('department');
        $post->employeeId= $request->input('employeeId');
        $post->positiontitle= $request->input('positiontitle');
        $post->Level= $request->input('Level');
        $post->employmenttype= $request->input('employmenttype');
        $post->birthdate= $request->input('birthdate');
        $post->citizenship= $request->input('citizenship');
        $post->salary= $request->input('salary');
        $post->startdate= $request->input('startdate');
        $post->gender= $request->input('gender');
        $post->save();
        return redirect()->route('Actions.registered')->with('success', 'Employee registered successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= Post::find($id);
        return view('Actions.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePost(Request $request, $id)
    {
        $request->validate([
            'profile_pic'=>'image|nullable|max:1999',
            'firstname'=>'required',
            'lastname'=>'required',
            'phonenumber'=>'required|min:10|max:13',
            'emergencycontact'=>'required',
            'email'=>'required|email',
            'department'=>'required',
            'employeeId'=>'required',
            'positiontitle'=>'required',
            'Level'=>'required',
            'employmenttype'=>'required',
            'birthdate'=>'required',
            'citizenship'=>'required',
            'salary'=>'required',
            'startdate'=>'required',
            'gender'=>'required'
        ]);
        // return $request->all();
        //Handle file upload
        if($request->hasFile('profile_pic')) {
            //Get filename with extension
            $filenameWithExt= $request->file('profile_pic')->getClientOriginalName();
            //Get just filename
            $filename= pathInfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension= $request->file('profile_pic')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore='_'.time().'.'.$extension;
            //Upload image
            $path= $request->file('profile_pic')->storeAs('public/uploaded_images', $fileNameToStore);
            }
            else {
                $fileNameToStore= 'noimage.jpeg';
            } 
           

        //register new employee
        $post= Post::find($id);
        $post->firstname= $request->input('firstname');
        $post->lastname= $request->input('lastname');
        // if($request->hasFile('profile_pic')){
            $post->profile_pic =$fileNameToStore;
        // }
        $post->phonenumber= $request->input('phonenumber');
        $post->emergencycontact= $request->input('emergencycontact');
        $post->email= $request->input('email');
        $post->department= $request->input('department');
        $post->employeeId= $request->input('employeeId');
        $post->positiontitle= $request->input('positiontitle');
        $post->Level= $request->input('Level');
        $post->employmenttype= $request->input('employmenttype');
        $post->birthdate= $request->input('birthdate');
        $post->citizenship= $request->input('citizenship');
        $post->salary= $request->input('salary');
        $post->startdate= $request->input('startdate');
        $post->gender= $request->input('gender');
        $post->save();
        return redirect()->route('Actions.employee_manage')->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePost($id)
    {
        $post= post::find($id);
        if($post->profile_pic != 'noimage.jpeg')
        {
            Storage::delete('/public/uploaded_images'.$post->profile_pic);
        }
        $post->delete();
        return redirect()->back()->with('success', 'employee deleted successfully');
    }

    public function manage()
    {
        $posts= Post::all();
        return view('Actions.employee_manage')->with('posts', $posts);
    }

}

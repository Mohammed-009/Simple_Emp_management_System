<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class salariesController extends Controller
{
    //
    public function makePayment()
    {
        $posts= Post::all();
        return view('Salaries.show')->with('posts', $posts);
    }

    public function employeeLeave()
    {
        $posts= Post::all();
        return view('Leave_requests.show')->with('posts', $posts);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesControllerUser extends Controller
{
    //
    public function MessagesRequests()
    {
        $messages= Message::all();
        return view('Complaints.show_message')->with('messages', $messages);
    }

    public function CreateMessage()
    {
        return view('UserEmployeeMessage.create_message');
    }

    public function MessageStore(Request $request)
    {
        $request->validate([
            'Name'=>'required',
            'EmployeeNumber'=>'required',
            'Phone'=>'required|min:10|max:13',
            'Email'=>'required|email',
            'MessageBody'=>'required',

        ]);
        // return $request->all();
        $message= new Message();
        // 
        $message->user_id= auth()->user()->id;
        // 
        $message->Name= $request->input('Name');
        $message->EmployeeNumber= $request->input('EmployeeNumber');
        $message->Phone= $request->input('Phone');
        $message->Email= $request->input('Email');
        $message->MessageBody= $request->input('MessageBody');
        $message->save();
        return back()->with('success', 'message sent successfully');
        
    }

    public function DeleteMessage($id)
    {
        $message= Message::find($id);
        $message->delete();
        return back()->with('success', 'message deleted successfully');
    }


    public function statusMessage()
    {
        $user= Auth::user();
        $message= $user->messages;
        return view('UserEmployeeMessage.status_message')->with('messages', $message);


    }
}

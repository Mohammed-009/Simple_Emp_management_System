<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\User;
use App\Models\Message;
use Nette\Utils\Random;
use App\Models\Department;
use Illuminate\Support\Str;
use App\Models\User_profile;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Profiler\Profile;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

        //homepage-login page
    public function index()
    {
        return view('auth.login');
    }

        // logout logic
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('homepage');
    }

        //Admin dashboard
    public function dashboard()
    {
        $postCount= Post::count();
        $departmentCount= Department::count();
        $requestCount= Message::count();
        $profileCount= User_profile::count();
        return view('dashboard')->with(['postCount'=>$postCount, 'departmentCount'=>$departmentCount, 'requestCount'=>$requestCount, 'profileCount'=>$profileCount]);
    }

    //user dashboard
    public function user_dashboard()
    {
        return view('userdashboard');
    }

    //login validation logic
    public function loginLogic(Request $request)
    {
        $request->validate([
            // 'email'=>'required|email',
            'username'=>'required|string|max:225|min:3',
            'password'=>'required|min:6'
        ]);

        // if(Auth::attempt(['email' => $request->email, 'password' => $request->password] , true)){
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password] , true)){
            if(auth()->user()->is_Admin==1) {
                return redirect()->route('dashboard')->with('success', 'successfully login');
            }
            else{
                return redirect('userdashboard')->with('success', 'successfully login!');
            }
        }else{
            return redirect()->back()->with('error', 'Incorrect email/password!');

        }
    }
    


        /* password reset logic */

    //reset password form
    public function sendEmailForm()
    {
        return view('auth.passwords.email');
    }

    //verify email in the database
    public function emailLogic(Request $request)
    {
        $email =  $request->email;
         $user = User::where('email',$email)->first();
        $token =Str::Random(32);

    //    return $name = User_profile::where('email',$email)->first();
        // $profile = $name->Firstname.' '.$name->Lastname;
        if(!$user){
        return redirect()->back()->with('warning', 'Email not found in our database');
        }

        $user->update(['remember_token' => $token]);

        Mail::to($email)->send(new ForgotPasswordMail($email, $token ));

        return redirect()->back()->with('success', 'Email sent successfully');

    }

    // token validations
    public function resetForm(Request $request)
    {
        $user =  User::where('remember_token', $request->token)->first();
        $email = $user->email;
        $token =  $request->token;

        if(!$user){
            return redirect()->back()->with('error', 'Invalid token used.');
        }
      
        return view('auth.passwords.reset')->with(['email' => $email, 'token' =>  $token]);
    }

    //New password and confirm password logic
    public function resetLogic(Request $request)
    {
        $request->validate([
            'password' => [
                'required',
                'confirmed',
                'min:4',
                'regex:/^(?=.*[A-Z])(?=.*[a-z]).{4,}$/',
            ],
            'password_confirmation' => 'required|string',
        ], [
            'password.password_confirm' => 'The password confirmation does not match.',
            'password.min' => 'The password must be at least 4 characters long.',
            'password.regex' => 'The password must be at least 4 characters long and include at least one uppercase letter, one lowercase letter.',
        ]);

        $user =  User::where('email', $request->email)
                    ->update([
                        'password' =>  Hash::make($request->password)
                    ]);

        // return redirect()->route('login')->with('success', 'Password reset successfully');

        return redirect()->route('logout')->with('success', 'Password reset successfully');
            
    }
}

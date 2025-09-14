<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User_Profile;
class ForgotPasswordMail extends Mailable
{

    use Queueable, SerializesModels;

    public $email;
    public $token;
    // public $profile;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $token)
    {
        $this->email = $email;
        // $this->profile = $profile;
        $this->token = $token;
        // dd($this->email);
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      
        return $this->subject('MohaaDev! Password Reset Link')->view('auth.passwords.forgotPasswordMail')->with([
            'email' => $this->email,
            'token' => $this->token,
            // 'profile' => $this->profile

        ]);
    }
}
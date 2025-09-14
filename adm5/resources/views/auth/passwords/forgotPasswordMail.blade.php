<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>Hello
        @php
           $userProfile = \App\Models\User::where('Email', $email)->first()->name;

        @endphp
            {{ ucfirst($userProfile)}},<br><br>
        You are receiving this email because we received a password reset request for your account. <br>
        <a href="{{ route('resetForm', ['token' => $token])}}" style="text-decoration: underline; color:blue; font-weight:bold">Click here</a> to reset your password. <br>
      
        This password reset link will expire in 60 minutes. <br>

        If you did not request a password reset, no further action is required.

Regards,
MohaaDev
</body>
</html>
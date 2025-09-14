@extends('auth.Layout_logins.app')

@section('content')
<div class="container">
<div class="align-center">
    <div class="div-center-login">
        <div class="card-body border-0 rounded-lg mt-5">
                <h6 class="text-center">RESET PASSWORD</h6>
                <form method="POST" action="{{ route('resetLogic', ['token' =>  $token])}}">
                    @csrf
                    <input type="hidden" name="email" value="{{ $email}}">
                    <input type="hidden" name="token" value="{{ $token}}">

                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" >Password</label>
                        <input type="password"  class="form-control" name="password"  required autocomplete="password" autofocus>
                    </div>
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label">Repeat Password</label>
                        <input type="password" class="form-control x-25" name="password_confirmation" required autocomplete="current-password">
                    </div>
                    <!-- Submit button -->
                    <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4" style="width: 300px;">Reset Password</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

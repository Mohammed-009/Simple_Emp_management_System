@extends('auth.Layout_logins.app')

@section('content')
<div class="container">
<div class="align-center">
    <div class="div-center-login">
        <div class="card-body border-0 rounded-lg mt-5">
            <h2 class="text-center">LOGIN</h2>
<form method="POST" action="{{route('loginLogic')}}">
    @csrf
    <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="username">Username</label>
      <input type="text" id="username" class="form-control" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
    </div>
  
    <!-- Password input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label" for="password">Password</label>
      <input type="password" id="password" class="form-control x-25" name="password" required autocomplete="current-password">
    </div>
  
    <!-- 2 column grid layout for inline styling -->
    <div class="row mb-4">
      <div class="col d-flex justify-content-center">
        <!-- Checkbox -->
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="form2Example31">
          <label class="form-check-label" for="form2Example31"> Remember me </label>
        </div>
      </div>
      <div class="col">
        <!-- Simple link -->
        <a href="{{ route('password.request') }}">Forgot password?</a>
      </div>
    </div>
  
    <!-- Submit button -->
    <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4" style="width: 300px;">Log in</button>
     <br>
  </form>
    </div>
    </div>
</div>
</div>
@endsection

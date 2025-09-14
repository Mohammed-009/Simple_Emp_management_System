@extends('auth.Layout_logins.app')

@section('content')
<div class="container">
    <div class="align-center">
        <div class="div-center">
            <div class="card border-0 rounded-lg mt-5">
                <h2 class="text-center">REGISTER</h2>
                <br>
                {{-- <form method="POST" action="{{route('register')}}">
                    @csrf
                    
                        <div class="form-group">
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus style="width: 300px;" placeholder="Enter name">
                        </div>
                    

                    
                        <div class="form-group">
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" style="width: 300px;" placeholder="Enter email">
                        </div>
                    

                    
                        <div class="form-group">
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" style="width: 300px;" placeholder="Enter password">
                        </div>
                

                    
                        <div class="form-group ">
                            <input type="password-confirm" id="password" class="form-control" name="password_confirmation" required autocomplete="new-password" style="width: 300px;" placeholder="Confirm password">
                        </div>
                    

                    <button type="submit" class="btn btn-primary btn-user btn-block">{{ __('Register')}}</button>
                    <hr>
                    {{-- <div class="text-center">
                        <a href="{{route('myLogin')}}" class="small">{{ __('Login here')}}</a>
                    </div> --}}
                {{-- </form>  --}}
                <form method="POST" action="{{route('registerAdmin')}}">
                    @csrf
                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email address">
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <input id="Username" type="text" class="form-control" name="Username" value="{{ old('Username') }}" required autocomplete="username" autofocus placeholder="Userame">
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="Password">
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                    </div>
                    <br>

                    <div class="text-center">
                    <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4 btn-sm" style="width: 300px;">{{ __('Register') }}</button>
                    </div>

                    <div class="text-center">
                        <a href="{{route('homepage')}}" class="small">{{ __('Login here')}}</a>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.frontend.login')
@section('content')
<div class="limiter">
    <div class="container-login100" style="background-image: url('{{asset('assets/login_front/images/bg-01.jpg')}}');">
        <div class="wrap-login100 p-t-30 p-b-50">
            <span class="login100-form-title p-b-41">
                Registrasi
            </span>
            <form method="POST" action="{{ route('register') }}" class="login100-form validate-form p-b-33 p-t-5">
                @csrf
                <div class="wrap-input100 validate-input" data-validate = "Enter Email">
                    <input class="input100" type="email" id="username" name="username" value="{{ old('username') }}" placeholder="Email">
                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" id="password" name="password" value="{{ old('password') }}" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter Password Confirmation">
                    <input class="input100" id="password_confirmation" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"placeholder="Password Confirmation">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="container-login100-form-btn m-t-32">
                    <button type="submit" class="login100-form-btn">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
	
	
	

	
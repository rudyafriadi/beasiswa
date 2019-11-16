@extends('layouts.frontend.login')
@section('content')
<div class="limiter">
    <div class="container-login100" style="background-image: url('{{asset('assets/login_front/images/bg-01.jpg')}}');">
        
        <div class="wrap-login100 p-t-30 p-b-50">
                @if(session('sukses'))  
                    <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5>Registrasi Berhasil</h5>
                    Silahkan tunggu email konfirmasi dari dinas terkait...!!!
                    </div>
                @endif
            <span class="login100-form-title p-b-41">
                Login
            </span>
            <form method="POST" action="{{ route('login') }}" class="login100-form validate-form p-b-33 p-t-5">
                @csrf
                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                    <input class="input100" type="email" value="{{ old('username') }}" name="username" placeholder="Email">
                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" value="{{ old('password') }}" name="password" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                </div>

                <div class="container-login100-form-btn m-t-32">
                    <button type="submit" class="login100-form-btn">
                        Login
                    </button>
                </div>
                <div class="container-login100-form-btn m-t-32">
                    <strong><a href="/frontend/register">Register</a></strong>
                </div>
                

            </form>
        </div>
    </div>
</div>
@endsection
	
	
	

	
@extends('layouts.app')

@section('css')
    <link rel="icon" type="image/png" href="{{asset('images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
<!--===============================================================================================-->
@endsection
@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-t-90 p-b-30">
            <form class="login100-form validate-form" method='post' action='{{ route('register') }}'>
                @csrf
                <span class="login100-form-title p-b-40 nav-links">
                    {{ __('Register') }}
                </span>
                <div class="wrap-input100 validate-input m-b-16">
                    <input class="input100" type="text" name="name" placeholder="{{ __('Name') }}" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-16">
                    <input class="input100" type="email" name="email" placeholder="{{ __('E-Mail Address') }}" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-20">
                    <input class="input100" type="password" name="password" placeholder="{{ __('Password') }}" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-20">
                    <input class="input100" type="password" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required>
                    <span class="focus-input100"></span>
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn nav-links">
                        Register
                    </button>
                </div>

                <div class="flex-col-c p-t-20">
                    <span class="txt2 p-b-10">
                        Already have an account?
                    </span>

                    <a href="#" class="txt3 bo1 hov1">
                        Sign in now
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!--===============================================================================================-->
	<script src="{{asset('vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('vendor/bootstrap/js/popper.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('js/main.js')}}"></script>
@endsection
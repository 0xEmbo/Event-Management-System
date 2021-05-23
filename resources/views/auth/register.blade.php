@extends('layouts.app')

@section('content')
<div class="pt170">
    <div class="container-login100">
        <div class="wrap-login100-sign p-t-10 p-b-30">
            <form class="login100-form validate-form" method='post' action='{{ route('register') }}'>
                @csrf
                <span class="login100-form-title">
                    {{ __('Register') }}
                </span>
                <div class="wrap-input100 m-b-10">
                    <label for="name">Name:</label>
                    <input class="input100" type="text" name="name" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 m-b-16">
                <label for="email">E-mail:</label>
                    <input class="input100" type="email" name="email" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 m-b-20">
                    <label for="password">Password</label>
                    <input class="input100" type="password" name="password" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 m-b-20">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input class="input100" type="password" name="password_confirmation" required>
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 m-b-16">
                    <label for="company">Company:</label>
                    <input class="input100" type="text" name="company" required>
                </div>
                <div class="wrap-input100 m-b-16">
                    <label for="birthday">Birth Date:</label>
                    <input class="input100" type="date" name="birthday" required>
                </div>
                <div class="wrap-input100 m-b-16">
                    <label for="address">Address:</label>
                    <input class="input100" type="text" name="address" required>
                </div>
                <div class="wrap-input100 m-b-16">
                    <label for="phone">Phone Number:</label>
                    <input class="input100" type="text" name="phone" required>
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

                    <a href="{{ route('login') }}" class="txt3 bo1 hov1">
                        Sign in now
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

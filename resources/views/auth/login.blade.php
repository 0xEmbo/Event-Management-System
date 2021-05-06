@extends('layouts.app')

@section('content')
<div class="pt170">
    <div class="container-login100">
        <div class="wrap-login100-sign p-t-90 p-b-30">
            <form class="login100-form validate-form" method='post' action='{{ route('login') }}'>
                @csrf
                <span class="login100-form-title p-b-40">
                    {{ __('Login') }}
                </span>
                <div class="wrap-input100 m-b-16" data-validate="Please enter email: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="{{ __('E-Mail Address') }}" value='{{ old('email') }}' required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 m-b-20" data-validate = "Please enter password">
                    <input class="input100" type="password" name="password" placeholder="{{ __('Password') }}" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" id="forgot_pass">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                        </div>
                    </div>
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn nav-links">
                        Login
                    </button>
                </div>

                <div class="flex-col-c p-t-20">
                    <span class="txt2 p-b-10">
                        Don’t have an account?
                    </span>

                    <a href="#" class="txt3 bo1 hov1">
                        Sign up now
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

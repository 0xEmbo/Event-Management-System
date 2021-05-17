@extends('layouts.app')

@section('content')
<div class="pt170">
    <div class="container-login100">
        <div class="wrap-login100-sign p-t-90 p-b-30">
            <form class="login100-form validate-form" method='post' action='{{ route('password.email') }}'>
                @csrf
                <span class="login100-form-title p-b-40">
                    {{ __('Reset Password') }}
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </span>
                <div class="wrap-input100" data-validate="Please enter email: ex@abc.xyz">
                    <input class="input100 @error('email') is-invalid @enderror" type="text" name="email" placeholder="{{ __('E-Mail Address') }}" value='{{ old('email') }}' required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn nav-links">
                        Reset
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="pt170">
    <div class="container-login100">
        <div class="p-t-90 p-b-30">
            <form class="login100-form validate-form" method="post" action="{{ route('event.join', $event->id) }}">
                @csrf
                <span class="login100-form-title p-b-40">Registeration Form</span>
                <div class="wrap-input100 m-b-16">
                    <label for="applicant_fname">First Name:</label>
                    <input class="input100" id="applicant_fname" type="text" name="applicant_fname" required>
                </div>
                <div class="wrap-input100 m-b-16">
                    <label for="applicant_lname">Last Name:</label>
                    <input class="input100" id="applicant_fname" type="text" name="applicant_lname" required>
                </div>
                <div class="wrap-input100 m-b-16">
                    <label for="applicant_email">Email Address:</label>
                    <input class="input100" id="applicant_email" type="email" name="applicant_email" required>
                </div>
                <div class="wrap-input100 m-b-16">
                    <label for="applicant_phone">Phone Number:</label>
                    <input class="input100" id="applicant_phone" type="tel" name="applicant_phone" pattern="+201[0-2][0-9]{8}" required>
                </div>
                <div class="wrap-input100 m-b-16">
                    <label for="applicant_address">Address:</label>
                    <input class="input100" id="applicant_address" type="text" name="applicant_address" required>
                </div>
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

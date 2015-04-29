@extends('layouts.app')

@section('content')
@include('partials.flash')
@include('partials.form-error')
<div id="displaySignUp" class="phone-process">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 columns">
                <div class="sign-up-title">
                    <h2>Sign up in seconds</h2>
                </div>
                <div class="auth-forms-wrapper">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Existing User</h2>
                            <form class="log-in-form" method="post" action="/auth/login">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="text" name="username" placeholder="Username" class="auth-form-input username-input" value="{{old('username')}}">
                                <input type="password" name="password" placeholder="Password" class="auth-form-input password-input">
                                <input type="submit" class="auth-btn" value="Log In">
                            </form>
                        </div>
                        <div class="col-md-6">
                            <h2 class="new-user-title">New User</h2>
                            <form class="sign-up-form" method="post" action="/auth/register">
                                <div class="register-step-1">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input id="registerUsernameInput" type="text" name="username" placeholder="Username" class="auth-form-input username-input" value="{{old('username')}}">
                                    <input id="registerNameInput" type="text" name="full_name" placeholder="Full Name" class="auth-form-input username-input" value="{{old('name')}}">
                                    <input id="registerEmailInput" type="email" name="email" placeholder="Email Address" class="auth-form-input email-input"  value="{{old('email')}}">
                                    <input id="registerPasswordInput" type="password" name="password" placeholder="Password" class="auth-form-input password-input">
                                    <button id="continueRegister"  class="auth-btn">Continue <i class="fa fa-arrow-right"></i></button>
                                </div>
                                <div class="register-step-2">
                                    <input type="hidden" name="country" value="usa">
                                    <input type="text" name="address" class="auth-form-input address-input" placeholder="Address"  value="{{old('address')}}">
                                    <input type="text" name="city" class="auth-form-input" placeholder="City"  value="{{old('city')}}">
                                    <input type="text" name="state" class="auth-form-input" placeholder="State" value="{{old('state')}}">
                                    <input type="number" name="zip" class="auth-form-input" placeholder="Zip" value="{{old('zip')}}">
                                    <input type="email" name="paypal_email" class="auth-form-input email-input" placeholder="Paypal Email" value="{{old('paypal_email')}}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button id="backRegister" class="auth-btn"><i class="fa fa-arrow-left"></i> Go Back</button>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="submit" class="auth-btn" value="Sign Up">
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
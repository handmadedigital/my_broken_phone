@extends('layouts.app')

@section('content')

<div id="displayPaymentMethod" class="phone-process">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="get-paid-title">
                    <h2>How should We Pay You?</h2>
                </div>
                <div class="get-paid-wrapper">
                    <form method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="email" name="paypal_email" class="auth-form-input email-input" placeholder="PayPal Email">
                        <input type="submit"  class="red-btn" value="Continue">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
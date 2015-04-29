@extends('layouts.app')

@section('content')

<div id="displayThankYou" class="phone-process">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="get-paid-title">
                    <h2>Your Order Has Been Placed</h2>
                </div>
                <div class="get-paid-wrapper center">
                    <h1>Thank you for your order</h1>
                    <h4>{{ucwords(Auth::user()->name)}}</h4>
                    <h6>(You will be receiving an email with the next few steps shortly)</h6>
                    <a href="/{{Auth::user()->slug}}/orders">Click Here to view your orders</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
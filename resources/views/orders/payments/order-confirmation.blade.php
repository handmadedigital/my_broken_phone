@extends('layouts.app')

@section('content')

<div id="displayPaymentMethod" class="phone-process">
    <div class="container">
     <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="get-paid-title">
                    <h2>Please Confirm Your Order</h2>
                </div>
                <div class="get-paid-wrapper">
                    <form method="post" action="/order/add-order">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="phone_id" value="{{$phone->id}}">
                        <input type="hidden" name="payment_method" value="{{Session::get('payment_method')}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="confirm-email">
                                    <h3 class="confirm-title">Contact Email:</h3>
                                    <div class="confirm-wrapper">
                                        {{$user->email}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="confirm-terms">
                                    <h3 class="confirm-title">Terms & Conditions:</h3>
                                    <div class="confirm-wrapper">
                                        <input type="checkbox" name="terms" id="termsCheckbox"> By checking this box, you agree to our <a href="#">Terms & Conditions</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="confirm-payment-address">
                                    <h3 class="confirm-title">Payment Address:</h3>
                                    <div class="confirm-wrapper">
                                        {{ucwords($user->last_name)}}, {{ucwords($user->first_name)}}<br/>
                                        {{$user->details->address}},<br/>
                                        {{ucwords($user->details->city)}}, {{ucwords($user->details->state)}}, {{$user->details->zip}}<br/>
                                        {{$user->details->country}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="confirm-shipping">
                                    <h3 class="confirm-title">Shipping Address:</h3>
                                    <div class="confirm-wrapper">
                                        {{ucwords($user->last_name)}}, {{ucwords($user->first_name)}},<br/>
                                        {{$user->details->address}},<br/>
                                        {{ucwords($user->details->city)}}, {{ucwords($user->details->state)}}, {{$user->details->zip}}<br/>
                                        {{$user->details->country}}
                                        {{$user->details->paypal_email}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="red-btn confirm-btn right">Confirm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
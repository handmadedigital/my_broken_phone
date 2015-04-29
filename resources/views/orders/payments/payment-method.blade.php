@extends('layouts.app')

@section('content')
<div id="displayPaymentMethod" class="phone-process">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 columns">
                <div class="get-paid-title">
                    <h2>How should We Pay You?</h2>
                </div>
                <div class="get-paid-wrapper">
                    <form method="post">
                        <input type="hidden" value="{{csrf_token()}}" name="_token">
                        <input type="hidden" value="2" name="payment_method">
                        <button class="get-paid-btn">Check</button>
                    </form>
                    <form method="post">
                        <input type="hidden" value="{{csrf_token()}}" name="_token">
                        <input type="hidden" value="1" name="payment_method">
                        <button class="get-paid-btn">PayPal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
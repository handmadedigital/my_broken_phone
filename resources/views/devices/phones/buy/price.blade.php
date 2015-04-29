@extends('layouts.app')
<?php
    $progress = 100;
?>
@section('content')
    <div class="container">
        <div id="hireProgress">
            <div class="row">
                 <div class="large-12 columns">
                     <ul class="steps-progress-bar">
                         <li id="first-step" class="active"><p>Carrier </p></li>
                         <li id="second-step" class="active"><p>Brand </p></li>
                         <li id="third-step" class="active"><p>Model</p></li>
                         <li id="fifth-step" class="active"><p>Memory</p></li>
                         <li id="fourth-step" class="active"><p>Condition</p></li>
                         <li id="sixth-step" class="active"><p>Quote</p></li>
                     </ul>
                 </div>
            </div>
        </div>
    </div>

    <div id="displayPrice" class="phone-process">
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="padding-right: 50px;">
                    <h3>Your Estimate</h3>
                    <div class="sell-phone-details-wrapper">
                        <div class="row">
                            <div class="col-md-8">
                                <h6>{{$phone->model->name}} {{$phone->capacity->name}}GB {{$phone->condition->name}}</h6>
                                <h6>Shipping</h6>
                            </div>
                            <div class="col-md-4">
                                <h6>${{$phone->price}}</h6>
                                <h6>Free</h6>
                            </div>
                        </div>
                    </div>
                    <div class="sell-phone-details-price-wrapper">
                         <div class="col-md-8">
                            <h6>Total</h6>
                        </div>
                        <div class="col-md-4">
                            <h6>${{$phone->price}}</h6>
                        </div>
                    </div>
                    <a href="/buy-phone/get-paid"><button class="price-page-btn right">Sell Your Device!</button></a>
                </div>
                <div class="col-md-6">
                    <div class="get-a-repair-quote-wrapper center">
                        <h3 style="color: #797979">Or<br/>Get A Quick<br/>Repair Quote<br/>& Compare Prices!</h3>
                        <a href="/buy-phone/problems"><button class="price-page-btn">Get A Quote</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

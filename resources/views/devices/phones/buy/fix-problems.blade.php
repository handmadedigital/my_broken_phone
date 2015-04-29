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
                <div class="col-md-6" style="padding-left: 50px;">
                    <div class="get-a-repair-quote-wrapper">
                        <form method="post" action="/buy-phone/problems">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <h3 class="get-repair-quote-title">What's Broken?</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="process-wrapper problem-wrapper">
                                        <label class="center @if(in_array(1, $problem_ids)) full-opacity @endif">
                                          Diagnostic Service
                                          <input @if( ! in_array(1, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="diagnostic-service">
                                        </label>
                                     </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="process-wrapper problem-wrapper">
                                        <label class="center @if(in_array(2, $problem_ids)) full-opacity @endif">
                                          Glass Only Replacement
                                          <input @if( ! in_array(2, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="glass-only-replacement">
                                        </label>
                                     </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="process-wrapper problem-wrapper">
                                        <label class="center @if(in_array(3, $problem_ids)) full-opacity @endif">
                                          Glass & LCD Replacement
                                          <input @if( ! in_array(3, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="glass-lcd-replacement">
                                        </label>
                                     </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="process-wrapper problem-wrapper">
                                        <label class="center @if(in_array(4, $problem_ids)) full-opacity @endif">
                                          Water Damage Diagnostic
                                          <input @if( ! in_array(4, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="water-damage-repair-diagnostic">
                                        </label>
                                     </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="process-wrapper problem-wrapper">
                                        <label class="center @if(in_array(5, $problem_ids)) full-opacity @endif">
                                          Battery Replacement
                                          <input @if( ! in_array(5, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="battery-replacement">
                                        </label>
                                     </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="process-wrapper problem-wrapper">
                                        <label class="center @if(in_array(6, $problem_ids)) full-opacity @endif">
                                          Camera Repair
                                          <input @if( ! in_array(6, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="camera-repair">
                                        </label>
                                     </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="process-wrapper problem-wrapper">
                                        <label class="center @if(in_array(7, $problem_ids)) full-opacity @endif">
                                          Charge Port Repair
                                          <input @if( ! in_array(7, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="charge-port-repair">
                                        </label>
                                     </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="process-wrapper problem-wrapper">
                                        <label class="center @if(in_array(8, $problem_ids)) full-opacity @endif">
                                          Power Button Repair
                                          <input @if( ! in_array(8, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="power-button-repair">
                                        </label>
                                     </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="process-wrapper problem-wrapper">
                                        <label class="center @if(in_array(9, $problem_ids)) full-opacity @endif">
                                          Volume Button Repair
                                          <input @if( ! in_array(9, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="volume-button-repair">
                                        </label>
                                     </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="process-wrapper problem-wrapper">
                                        <label class="center @if(in_array(10, $problem_ids)) full-opacity @endif">
                                          Ear Speaker Repair
                                          <input @if( ! in_array(10, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="ear-speaker-repair">
                                        </label>
                                     </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="process-wrapper problem-wrapper">
                                        <label class="center @if(in_array(11, $problem_ids)) full-opacity @endif">
                                          Loudspeaker Repair
                                          <input @if( ! in_array(11, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="loudspeaker-repair">
                                        </label>
                                     </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="process-wrapper problem-wrapper">
                                        <label class="center @if(in_array(12, $problem_ids)) full-opacity @endif">
                                          Microphone Repair
                                          <input @if( ! in_array(12, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="microphone-repair">
                                        </label>
                                     </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="process-wrapper problem-wrapper">
                                        <label class="center @if(in_array(13, $problem_ids)) full-opacity @endif">
                                          Vibrator Repair
                                          <input @if( ! in_array(13, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="vibrator-repair">
                                        </label>
                                     </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="process-wrapper problem-wrapper">
                                        <label class="center @if(in_array(14, $problem_ids)) full-opacity @endif">
                                          Not Sure
                                          <input @if( ! in_array(14, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="not-sure">
                                        </label>
                                     </div>
                                </div>
                            </div>
                            <button type="submit" class="price-page-btn right">Get Your Quote!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="hireProgress">
            <div class="row">
                 <div class="col-md-12">
                     <ul class="fix-phone-steps-progress-bar">
                         <li id="first-step" class="active"><p>Brands </p></li>
                         <li id="second-step" class="active"><p>Models </p></li>
                         <li id="third-step" class="active"><p>Problems</p></li>
                         <li id="fifth-step" class="active"><p>Price</p></li>
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
                            <h6>{{$model->name}}</h6>
                            @foreach($problems as $problem)
                                <h6>{{$problem->name}}</h6>
                            @endforeach
                            <h6>Shipping</h6>
                        </div>
                        <div class="lcol-md-4">
                            <h6>Price</h6>
                            <?php $total = 0; ?>
                            @foreach($problems as $problem)
                                <h6>${{$problem->pivot->price}}</h6>
                                <?php $total += (int) $problem->pivot->price;?>
                            @endforeach
                            <h6>Free</h6>
                        </div>
                    </div>
                </div>
                <div class="sell-phone-details-price-wrapper">
                     <div class="col-md-8 no-padding">
                        <h6>Total</h6>
                    </div>
                    <div class="col-md-4">
                        <h6>${{$total}}</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="padding-left: 50px;">
                <div class="get-a-repair-quote-wrapper">
                    <form method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <h3 style="font-size: 30px;">What's Your Capacity?</h3>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="rod-col-20">
                                        <div class="process-wrapper fix-capacities-wrapper">
                                            <label for="inputCapacity1" class="capacity-8-img @if(in_array(1, $capacity_ids)) full-opacity @endif"><span></span></label>
                                            <input id="inputCapacity1" type="radio" name="capacity_slug" value="8">
                                        </div>
                                    </div>
                                    <div class="rod-col-20">
                                        <div class="process-wrapper fix-capacities-wrapper">
                                            <label for="inputCapacity22" class="capacity-16-img @if(in_array(2, $capacity_ids)) full-opacity @endif"><span></span></label>
                                            <input  id="inputCapacity22" type="radio" name="capacity_slug" value="16">
                                        </div>
                                    </div>
                                    <div class="rod-col-20">
                                        <div class="process-wrapper fix-capacities-wrapper">
                                            <label for="inputCapacity3" class="capacity-32-img @if(in_array(3, $capacity_ids)) full-opacity @endif"><span></span></label>
                                            <input id="inputCapacity3" type="radio" name="capacity_slug" value="32">
                                        </div>
                                    </div>
                                    <div class="rod-col-20">
                                        <div class=" process-wrapper fix-capacities-wrapper">
                                            <label for="inputCapacity4" class="capacity-64-img @if(in_array(4, $capacity_ids)) full-opacity @endif"><span></span></label>
                                            <input id="inputCapacity4" type="radio" name="capacity_slug" value="64">
                                        </div>
                                    </div>
                                    <div class="rod-col-20">
                                        <div class="process-wrapper fix-capacities-wrapper">
                                            <label for="inputCapacity5" class="capacity-128-img @if(in_array(5, $capacity_ids)) full-opacity @endif"><span></span></label>
                                            <input id="inputCapacity5" type="radio" name="capacity_slug" value="128">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <button class="price-page-btn right">Pick Phone Condition</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@stop

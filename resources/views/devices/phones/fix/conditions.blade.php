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
                        <h3 style="font-size: 30px;">What's Your Condition?</h3>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    @foreach(array_chunk($conditions->all(), 3) as $row)
                                        <div class="row">
                                           @foreach($row as $condition)
                                                <div class="col-md-4">
                                                    <div class="conditions-wrapper process-wrapper small-process-wrapper">
                                                        <label for="inputCondition{{$condition->id}}"><img src="/static/img/{{$condition->img}}"></label>
                                                        <h4 class="condition-title">{{$condition->name}}</h4>
                                                        <input id="inputCondition{{$condition->id}}" type="radio" name="condition_slug" value="{{$condition->slug}}">
                                                    </div>
                                                </div>
                                           @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        <button class="price-page-btn right">Get Price</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@stop

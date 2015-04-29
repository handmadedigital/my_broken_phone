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
            <div class="col-md-6">
                <div class="get-a-repair-quote-wrapper center">
                    <h3 style="color: #797979">Or<br/>Get A Quick<br/>Phone Quote<br/>& Compare Prices!</h3>
                    <a href="/fix-phone/carriers"><button class="price-page-btn">Get A Quote</button></a>
                </div>
            </div>
        </div>
    </div>
</div>


@stop

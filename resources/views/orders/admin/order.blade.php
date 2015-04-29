@extends('layouts.admin')

@section('admin-content')
    <div id="order">
        <div class="row">
            <div id="userOrderInfo">
                <div class="user-info-title">
                    <h4>User Info</h4>
                </div>
                <div class="user-info-body">
                    <div class="col-md-2">
                        <img class="user-info-phone-img" src="/static/img/{{$order->phone->model->img}}">
                    </div>
                    <div class="col-md-10 user-info-details">
                        <div class="user-info-username info-border-bottom">
                            <h4><span class="title">Username: </span>{{$order->user->username}}</h4>
                        </div>
                        <div class="user-info-username info-border-bottom">
                            <h4><span class="title">Full Name: </span>{{ucwords($order->user->first_name)}}</h4>
                        </div>
                        <div class="user-info-username info-border-bottom">
                            <h4><span class="title">Email: </span>{{$order->user->email}}</h4>
                        </div>
                        <div class="user-info-username">
                            <h4><span class="title">Address: </span>{{$order->user->details->address}}<br/>{{$order->user->details->city}}, {{$order->user->details->state}}, {{$order->user->details->zip}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="orderInfo">
        <table class="table table-striped">
            <thead>
                    <tr>
                        <th>Order Info</th>
                        <th>Phone Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Order #: </strong> {{$order->order_number}}</td>
                        <td><strong>Carrier: </strong> {{$order->phone->carrier->name}}</td>
                    </tr>
                    <tr>
                        @if( ! $order->isPlaced())
                            <td><strong>Quote: </strong> ${{$order->price}}</td>
                        @else
                            <td><strong>Quote:</strong>
                                <form  method="post" action="/admin/order/set-price" class="user-order-form">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="order_id" value="{{$order->id}}">
                                        <input type="number" class="set-price-input" name="price" placeholder="$0.00">
                                        <button class="set-price-btn btn btn-red" type="submit">Set Price</button>
                                </form>
                            </td>
                        @endif
                        <td><strong>Condition: </strong> {{$order->phone->condition->name}}</td>
                    </tr>
                    <tr>
                        <td><strong>Estimate Price: </strong> ${{$order->phone->price}}</td>
                        <td><strong>Model: </strong> {{$order->phone->model->name}}</td>
                    </tr>
                    @if($order->payment_method == 'PayPal')
                        <tr>
                            <td><strong>Payment Method:</strong> {{$order->payment_method->name}}</td>
                            <td><strong>Brand:</strong> {{$order->phone->brand->name}}</td>
                        </tr>
                        <tr>
                            <td><strong>Paypal Email:</strong> {{ucwords($order->user->details->paypal_email)}}</td>
                            <td><strong>Capacity:</strong> {{$order->phone->capacity->name}} GB</td>
                        </tr>
                    @else
                        <tr>
                            <td><strong>Payment Method:</strong> {{$order->payment_method->name}}</td>
                            <td><strong>Brand:</strong> {{$order->phone->brand->name}}</td>
                        </tr>
                        <tr>
                            <td><strong>Payable To:</strong> {{ucwords($order->user->name)}}</td>
                            <td><strong>Capacity:</strong> {{$order->phone->capacity->name}} GB</td>
                        </tr>
                    @endif
                    <tr>
                        <td><strong>Status:</strong> {{$order->status->name}}</td>
                        <td><strong>Date/Time:</strong> {{$order->created_at}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
@stop
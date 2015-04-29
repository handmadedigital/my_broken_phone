@extends('layouts.user')

@section('user-content')
    <div id="orders">
        <table id="ordersTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Date</th>
                    <th>Estimate</th>
                    <th>Condition</th>
                    <th>Price Quote</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td><a href="/{{Auth::user()->slug}}/order/{{$order->order_number}}">{{$order->order_number}}</a></td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->phone->price}}</td>
                        <td>{{$order->phone->condition->name}}</td>
                        @if($order->price == '0.00')
                            <td>N/A</td>
                        @else
                            <td>$ {{$order->price}}</td>
                        @endif
                        <td>{{$order->status->name}}</td>
                        @if($order->isPlaced())
                            <td><button disabled class="grey-btn waiting-btn">Waiting For Quote</button></td>
                        @elseif($order->isQuoted())
                            <td>
                                <div class="row order-acceptance-btns">
                                    <div class="col-md-6">
                                        <form method="post" action="/order/accept">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <input type="hidden" name="order_id" value="{{$order->id}}">
                                            <button type="submit" class="red-btn btn accept-btn offer-btn">Accept</button>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <form method="post" action="/order/decline">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <input type="hidden" name="order_id" value="{{$order->id}}">
                                            <button type="submit" class="offer-btn btn decline-btn red-btn">Decline</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        @elseif($order->isDeclined())
                            <td><button disabled class="offer-btn btn decided-btn decline-btn red-btn">Declined</button></td>
                        @elseif($order->isAccepted())
                            <td><button disabled class="red-btn btn decided-btn accepted-button accept-btn offer-btn">Accepted</button></td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
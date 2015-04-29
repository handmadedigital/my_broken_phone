@extends('layouts.admin')

@section('admin-content')
    <div id="orders">
        <table id="ordersTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>User</th>
                    <th>Date</th>
                    <th>Estimate</th>
                    <th>Condition</th>
                    <th>Price Quote</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td><a href="/admin/order/{{$order->order_number}}">{{$order->order_number}}</a></td>
                        <td>{{ucwords($order->user->first_name)}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->phone->price}}</td>
                        <td>{{$order->phone->condition->name}}</td>
                        @if($order->isPlaced())
                            <td>
                                <form method="post" action="/admin/order/set-price">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="order_id" value="{{$order->id}}">
                                    <input type="number" class="set-price-input" name="price" placeholder="$0.00">
                                    <button class="set-price-btn btn btn-red" type="submit">Set Price</button>
                                </form>
                            </td>
                        @else
                            <td>$ {{$order->price}}</td>
                        @endif
                        <td>{{$order->status->name}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
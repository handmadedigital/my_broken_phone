@extends('layouts.app')

@section('content')
<div id="userContentWrapper">
    <div class="row">
        <div class="col-md-2 no-padding">
            <div id="userSidebar">
                <div class="search-user-order-wrapper">
                    <form>
                        <i class="fa fa-search"></i><input type="search" name="order_number" id="userOrderSearchInput" placeholder="Search for order">
                    </form>
                </div>
                <div class="user-info-wrapper">
                    <h3 class="confirm-title">Full Name:</h3>
                    <div class="confirm-wrapper">
                        {{ucwords(Auth::user()->first_name)}} {{ucwords(Auth::user()->last_name)}}
                    </div>
                </div>
                <div class="user-info-wrapper">
                    <h3 class="confirm-title">Username:</h3>
                    <div class="confirm-wrapper">
                        {{Auth::user()->username}}
                    </div>
                </div>
                <div class="user-info-wrapper">
                    <h3 class="confirm-title">Email:</h3>
                    <div class="confirm-wrapper">
                        {{Auth::user()->email}}
                    </div>
                </div>
                <div class="user-info-wrapper">
                    <h3 class="confirm-title">Paypal Email:</h3>
                    <div class="confirm-wrapper">
                        {{Auth::user()->details->paypal_email}}
                    </div>
                </div>
                <div class="user-info-wrapper">
                    <h3 class="confirm-title">Payment Address:</h3>
                    <div class="confirm-wrapper">
                        {{Auth::user()->details->address}}<br/>
                        {{Auth::user()->details->city}}, {{Auth::user()->details->state}}, {{Auth::user()->details->zip}}
                    </div>
                </div>
                <div class="user-info-wrapper">
                    <h3 class="confirm-title">Shipping Address:</h3>
                    <div class="confirm-wrapper">
                        {{Auth::user()->details->address}}<br/>
                        {{Auth::user()->details->city}}, {{Auth::user()->details->state}}, {{Auth::user()->details->zip}}
                    </div>
                </div>
            </div>
        </div><!-- END SIDE BAR -->
        <div class="col-md-10 no-padding">
            <div id="userBody">
                @yield('user-content')
            </div>
        </div>
    </div>
</div>
@endsection
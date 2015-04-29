@extends('layouts.app')

@section('content')
    <div id="adminContentWrapper">
        <div class="row">
            <div class="col-md-2 no-padding">
                <div id="adminSidebar">
                    <div id="adminLogo">
                        <img src="/static/img/admin-logo.png">
                    </div>
                </div>
            </div><!-- END ADMIN SIDEAR -->
            <div class="col-md-10 no-padding">
                <div id="adminBody">
                    @include('partials.form-error')
                    @include('partials.flash')
                    @yield('admin-content')
                </div>
            </div>
        </div>
    </div>
@stop
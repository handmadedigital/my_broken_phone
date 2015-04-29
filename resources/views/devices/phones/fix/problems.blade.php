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
                         <li id="fifth-step" class=""><p>Price</p></li>
                     </ul>
                 </div>
            </div>
        </div>
    </div>

    @include('partials.phones.display-problems')
@stop

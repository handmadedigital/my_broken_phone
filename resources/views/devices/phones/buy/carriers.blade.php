@extends('layouts.app')
@section('content')

    <div class="container">
        <div id="hireProgress">
            <div class="row">
                 <div class="col-md-12">
                     <ul class="steps-progress-bar">
                         <li id="first-step" class="active"><p>Carrier </p></li>
                         <li id="second-step" class=""><p>Brand </p></li>
                         <li id="third-step" class=""><p>Model</p></li>
                         <li id="fifth-step" class=""><p>Memory</p></li>
                         <li id="fourth-step" class=""><p>Condition</p></li>
                         <li id="sixth-step" class=""><p>Quote</p></li>
                     </ul>
                 </div>
            </div>
        </div>
    </div>

    @include('partials.phones.display-carriers')
@stop

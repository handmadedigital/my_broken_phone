@extends('layouts.app')
<?php
    $progress = 83.3;
?>
@section('content')
    <div class="container">
        <div id="hireProgress">
            <div class="row">
                 <div class="large-12 columns">
                     <ul class="steps-progress-bar">
                         <li id="first-step" class="active"><p>Carrier </p></li>
                         <li id="second-step" class="active"><p>Brand </p></li>
                         <li id="third-step" class="active"><p>Model</p></li>
                         <li id="fifth-step" class="active"><p>Memory</p></li>
                         <li id="fourth-step" class="active"><p>Condition</p></li>
                         <li id="sixth-step" class=""><p>Quote</p></li>
                     </ul>
                 </div>
            </div>
        </div>
    </div>

    @include('partials.phones.display-conditions')
@stop

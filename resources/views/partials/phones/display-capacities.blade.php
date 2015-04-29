<div id="displayCapacities" class="phone-process">
    <div class="container">
        <form method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <h1 class="center process-title">What Is Your Phone's Capacity?</h1>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="rod-col-20">
                        <div class="capacities-wrapper process-wrapper">
                            <label for="inputCapacity1" class="capacity-8-img @if(in_array(1, $capacity_ids)) full-opacity @endif"><span></span></label>
                            <input id="inputCapacity1" type="radio" name="capacity_slug" value="8">
                        </div>
                    </div>
                    <div class="rod-col-20">
                        <div class="capacities-wrapper process-wrapper">
                            <label for="inputCapacity2" class="capacity-16-img @if(in_array(2, $capacity_ids)) full-opacity @endif"><span></span></label>
                            <input  id="inputCapacity2" type="radio" name="capacity_slug" value="16">
                        </div>
                    </div>
                    <div class="rod-col-20">
                        <div class="capacities-wrapper process-wrapper">
                            <label for="inputCapacity3" class="capacity-32-img @if(in_array(3, $capacity_ids)) full-opacity @endif"><span></span></label>
                            <input id="inputCapacity3" type="radio" name="capacity_slug" value="32">
                        </div>
                    </div>
                    <div class="rod-col-20">
                        <div class="capacities-wrapper process-wrapper">
                            <label for="inputCapacity4" class="capacity-64-img @if(in_array(4, $capacity_ids)) full-opacity @endif"><span></span></label>
                            <input id="inputCapacity4" type="radio" name="capacity_slug" value="64">
                        </div>
                    </div>
                    <div class="rod-col-20">
                        <div class="capacities-wrapper process-wrapper">
                            <label for="inputCapacity5" class="capacity-128-img @if(in_array(5, $capacity_ids)) full-opacity @endif"><span></span></label>
                            <input id="inputCapacity5" type="radio" name="capacity_slug" value="128">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="process-btns">
                        <button class="left img-btn" id="stepsGoBack"><img src="/static/img/arrow-left.png"></button>
                        <button class="right img-btn" onclick="submitStep()"><img src="/static/img/arrow-right.png"></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
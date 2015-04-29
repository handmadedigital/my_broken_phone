<div id="displayConditions" class="phone-process">
    <div class="container">
        <form method="post">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <h1 class="center process-title">Wha Is Your Phone's Condition?</h1>
                    @foreach(array_chunk($conditions->all(), 3) as $row)
                        <div class="row">
                           @foreach($row as $condition)
                                <div class="col-md-4">
                                    <div class="conditions-wrapper process-wrapper">
                                        <label for="inputCondition{{$condition->id}}"><img src="/static/img/{{$condition->img}}"></label>
                                        <h3 class="condition-title">{{$condition->name}}</h3>
                                        <input id="inputCondition{{$condition->id}}" type="radio" name="condition_slug" value="{{$condition->slug}}">
                                    </div>
                                </div>
                           @endforeach
                        </div>
                    @endforeach
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

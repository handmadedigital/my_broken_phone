<div id="displayCarriers">
    <div class="container">
        <form method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1 class="process-title center">Who's Your Carrier?</h1>
                    @foreach(array_chunk($carriers->all(), 3) as $row)
                            <div class="row">
                               @foreach($row as $carrier)
                                    <div class="col-md-4">
                                        <div class="carrier-wrapper process-wrapper">
                                            <label id="carrier{{$carrier->slug}}Wrapper" for="inputCarrier{{$carrier->id}}"><img src="/static/img/{{$carrier->img}}"></label>
                                            <input id="inputCarrier{{$carrier->id}}" type="radio" name="carrier_slug" value="{{$carrier->slug}}">
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
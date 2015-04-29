<div id="displayModels" class="phone-process">
    <div class="container">
        <form method="post">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <h1 class="center process-title">What Is Your Phone's Model?</h1>
                    @foreach(array_chunk($models->all(), 4) as $row)
                            <?php
                                $margin_left = 0;
                                $left_over = 4 - count($row);

                                if($left_over == 1)
                                {
                                    $margin_left = 12.5;
                                }
                                else if($left_over == 2)
                                {
                                    $margin_left = 25;
                                }
                                elseif($left_over == 3)
                                {
                                    $margin_left = 37.5;
                                }
                            ?>
                            <div class="extra-row" style="margin-left: {{$margin_left}}%">
                               @foreach($row as $model)
                                    <div class="col-md-3">
                                        <div class="model-wrapper process-wrapper">
                                            <label for="inputModel{{$model->id}}"><img src="/static/img/{{$model->img}}"></label>
                                            <h3 class="model-title">{{$model->name}}</h3>
                                            <input id="inputModel{{$model->id}}" type="radio" name="model_slug" value="{{$model->slug}}">
                                        </div>
                                    </div>
                               @endforeach
                            </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="process-btns model-process-btns">
                        <button class="left img-btn" id="stepsGoBack"><img src="/static/img/arrow-left.png"></button>
                        <button class="right img-btn" onclick="submitStep()"><img src="/static/img/arrow-right.png"></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
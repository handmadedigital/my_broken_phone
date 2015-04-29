<div id="displayBrands" class="phone-process">
    <div class="container">
        <form method="post">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <h1 class="center process-title">What Is Your Phone's Brand?</h1>
                    @foreach(array_chunk($brands->all(), 4) as $row)
                            <div class="row">
                               @foreach($row as $brand)
                                    <div class="col-md-3">
                                        <div class="brand-wrapper process-wrapper">
                                            <label for="inputBrand{{$brand->id}}"><img src="/static/img/{{$brand->img}}"></label>
                                            <input id="inputBrand{{$brand->id}}" type="radio" name="brand_slug" value="{{$brand->slug}}">
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
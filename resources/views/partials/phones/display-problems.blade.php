<div id="displayProblems" class="phone-process">
    <div class="container">
        <form method="post">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <h1 class="center process-title">What Are Your Phone's Problems?</h1>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="/static/img/problem-phone-img.png">
                        </div>
                        <div class="col-md-8">
                            <div class="col-md-6">
                                <div class="process-wrapper problem-wrapper">
                                    <label class="center @if(in_array(1, $problem_ids)) full-opacity @endif">
                                      Diagnostic Service
                                      <input @if( ! in_array(1, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="diagnostic-service">
                                    </label>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="process-wrapper problem-wrapper">
                                    <label class="center @if(in_array(2, $problem_ids)) full-opacity @endif">
                                      Glass Only Replacement
                                      <input @if( ! in_array(2, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="glass-only-replacement">
                                    </label>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="process-wrapper problem-wrapper">
                                    <label class="center @if(in_array(3, $problem_ids)) full-opacity @endif">
                                      Glass & LCD Replacement
                                      <input @if( ! in_array(3, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="glass-lcd-replacement">
                                    </label>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="process-wrapper problem-wrapper">
                                    <label class="center @if(in_array(4, $problem_ids)) full-opacity @endif">
                                      Water Damage Repair Diagnostic
                                      <input @if( ! in_array(4, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="water-damage-repair-diagnostic">
                                    </label>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="process-wrapper problem-wrapper">
                                    <label class="center @if(in_array(5, $problem_ids)) full-opacity @endif">
                                      Battery Replacement
                                      <input @if( ! in_array(5, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="battery-replacement">
                                    </label>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="process-wrapper problem-wrapper">
                                    <label class="center @if(in_array(6, $problem_ids)) full-opacity @endif">
                                      Camera Repair
                                      <input @if( ! in_array(6, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="camera-repair">
                                    </label>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="process-wrapper problem-wrapper">
                                    <label class="center @if(in_array(7, $problem_ids)) full-opacity @endif">
                                      Charge Port Repair
                                      <input @if( ! in_array(7, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="charge-port-repair">
                                    </label>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="process-wrapper problem-wrapper">
                                    <label class="center @if(in_array(8, $problem_ids)) full-opacity @endif">
                                      Power Button Repair
                                      <input @if( ! in_array(8, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="power-button-repair">
                                    </label>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="process-wrapper problem-wrapper">
                                    <label class="center @if(in_array(9, $problem_ids)) full-opacity @endif">
                                      Volume Button Repair
                                      <input @if( ! in_array(9, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="volume-button-repair">
                                    </label>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="process-wrapper problem-wrapper">
                                    <label class="center @if(in_array(10, $problem_ids)) full-opacity @endif">
                                      Ear Speaker Repair
                                      <input @if( ! in_array(10, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="ear-speaker-repair">
                                    </label>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="process-wrapper problem-wrapper">
                                    <label class="center @if(in_array(11, $problem_ids)) full-opacity @endif">
                                      Loudspeaker Repair
                                      <input @if( ! in_array(11, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="loudspeaker-repair">
                                    </label>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="process-wrapper problem-wrapper">
                                    <label class="center @if(in_array(12, $problem_ids)) full-opacity @endif">
                                      Microphone Repair
                                      <input @if( ! in_array(12, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="microphone-repair">
                                    </label>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="process-wrapper problem-wrapper">
                                    <label class="center @if(in_array(13, $problem_ids)) full-opacity @endif">
                                      Vibrator Repair
                                      <input @if( ! in_array(13, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="vibrator-repair">
                                    </label>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="process-wrapper problem-wrapper">
                                    <label class="center @if(in_array(14, $problem_ids)) full-opacity @endif">
                                      Not Sure
                                      <input @if( ! in_array(14, $problem_ids)) disabled @endif class="left" type="checkbox" name="problem_slug[]" value="not-sure">
                                    </label>
                                 </div>
                            </div>
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
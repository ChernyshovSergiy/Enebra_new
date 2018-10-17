

<div class="row hidden-sm hidden-xs" style="font-size: 17px; font-family: 'RobotoLight', sans-serif">

    {{--@if( $locale -> slug == 'ru' )--}}

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css.map">

        <div class="col-lg-8 col-lg-offset-2 col-xs-12" style="color: #c0dafe; text-align: center;">
            @if(LaravelLocalization::getCurrentLocale() == 'ru')
                <p class="text-center">Выпущены первые 4 части видео презентации проекта:</p>
                <a target="_blank" href="https://www.youtube.com/watch?v=ovcJfixhlRM&list=PLfZ4h9S6Oswi0R_0ApIvQ0bN5x-DFEMr5">
                    <i class="fa fa-youtube fa-3x" style="color: #c0dafe;" aria-hidden="true"></i>
                </a>
                <p class="text-center" >Приятного вам просмотра!!!</p>
            @else
                <p class="text-center">The first 4 parts of the project video presentation are released:</p>
                <a target="_blank" href="https://www.youtube.com/watch?v=9k6Di1TVhbE&list=PLfZ4h9S6OswiltFEBJhh8lHz5N5uc53XL">
                    <i class="fa fa-youtube fa-3x" style="color: #c0dafe;" aria-hidden="true"></i>
                </a>
                <p class="text-center" >Enjoy your viewing !!!</p>
            @endif
        </div>

    <!--   <div class="col-lg-5 col-lg-offet-7 col-md-6 col-md-offset-6 col-sm-12 col-xs-12" style="margin-bottom: 5px;margin-top: 15px;">
               {{Lang::get('timer.to')}} <span class="blue">{{Lang::get('timer.exit')}} </span> {{Lang::get('timer.realise')}} <span class="blue">{{Lang::get('timer.network')}}</span> {{Lang::get('timer.isset')}}
            </div>

            <div class="col-lg-5 col-lg-offet-7 col-md-6 col-md-offset-6 col-sm-12 col-xs-12">

                <center>

                    <div class="timer-style">

                          <span id="days" style="display: block;font-size: 33px;"></span>
                          <span>{{Lang::get('timer.days')}}</span>

                </div>

                <div class="timer-style">

                      <span id="hours" style="display: block;font-size: 33px;"></span>
                      <span>{{Lang::get('timer.hours')}}</span>

                </div>
                <div class="timer-style">

                      <span id="min" style="display: block;font-size: 33px;"></span>
                      <span>{{Lang::get('timer.min')}}</span>

                </div>
                <div class="timer-style">
 
                      <span  id="sec" style="display: block;font-size: 33px;"></span>
                      <span>{{Lang::get('timer.sec')}}</span>
                    
                </div>

            </center>
            
            </div>
         -->
    {{--@else--}}
    <!-- <div class="col-lg-5 col-lg-offet-7 col-md-6 col-md-offset-6 col-sm-12 col-xs-12" style="color: #c0dafe;">
            {{--{{Lang::get('index.not_worked')}}--}}
            </div> -->
    {{--@endif--}}
</div>
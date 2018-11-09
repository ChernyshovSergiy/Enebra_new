<div class="container-fluid full-desc-of-project">

    <div class="container-title hidden-md hidden-lg"><h3><span>@lang('index.full_description')</span></h3></div>

    <div class="clearfix"></div>


    {{--@foreach( $locale -> index_pages -> chunk( 3 ) as $element )--}}

        {{--@foreach( $element as $k => $page )--}}

            {{--<div onclick="window.location.href='{{asset( 'information/' . $page -> slug )}}'" class="col-md-4 col-sm-6 desc-marg description-{{$k + 1}} bl-vid-{{($k + 1)}}">--}}

                {{--<div class="desc full-desc-{{($k + 1)}}">--}}

                    {{--<div class="desc-opacity">--}}

                        {{--<h3><span>{{($k + 1)}}</span>{{$page -> title}}</h3>--}}

                        {{--<div>{!! htmlspecialchars_decode( $page -> index_description ) !!}</div>--}}
                        {{--<a class="read_more" href="{{asset( 'information/' . $page -> slug )}}"><span class="hidden-820">{{Lang::get('app.read_more')}}</span><span class="hidden-1920 show-820">{{Lang::get('app.more')}}</span></a>--}}

                    {{--</div>--}}

                {{--</div>--}}

            {{--</div>--}}


        {{--@endforeach--}}

        {{--<div class="clearfix"></div>--}}

    {{--@endforeach--}}


    <div class="desc-men"><img src="{{ asset('img/men.png')}}"/></div>
    <div class="clearfix"></div>
    <div class="container-title hidden-sm hidden-xs"><h3><span>@lang('index.full_description')</span></h3></div>

</div>

{{--<div class="container-fluid full-desc-of-project">--}}
    {{--<div class="container-title hidden-md hidden-lg"><h3><span>Full description of the project</span></h3></div>--}}
    {{--<div class="clearfix"></div>--}}
    {{--<div class="col-md-4 col-sm-6 desc-marg f-bl-vid">--}}
        {{--<div class="desc full-desc-first">--}}
            {{--<div class="desc-opacity">--}}
                {{--<h3><span>1</span> purpose</h3>--}}
                {{--<div>--}}
                    {{--<ul>--}}
                        {{--<li>To provide a minimum living wage to every person from birth until death.</li>--}}
                        {{--<li>To remove dependence of people on--}}
                            {{--the currently existing financial system,--}}
                            {{--which, in turn, would make impossible--}}
                            {{--the processes of inflation, unaccounted--}}
                            {{--money issue, any financialcrises. The--}}
                            {{--system should completely exclude the--}}
                            {{--physical loss of the money ...</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
                {{--<a class="read_more" href=""><span class="hidden-820">Read more</span><span class="hidden-1920 show-820">MORE</span></a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-4 col-sm-6 desc-marg desc-center s-bl-vid">--}}
        {{--<div class="desc full-desc-sec">--}}
            {{--<div class="desc-opacity">--}}
                {{--<h3><span>2</span> description</h3>--}}
                {{--<div>--}}
                    {{--To provide a minimum living wage to every person from birth until death.--}}
                    {{--To remove dependence of people on--}}
                    {{--the currently existing financial system,--}}
                    {{--which, in turn, would make impossible--}}
                    {{--the processes of inflation, unaccounted--}}
                    {{--money issue, any financialcrises. The--}}
                    {{--system should completely exclude the--}}
                    {{--physical loss of the money--}}
                {{--</div>--}}
                {{--<a class="read_more"  href=""><span class="hidden-820">Read more</span><span class="hidden-1920 show-820">MORE</span></a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-4 col-sm-6 desc-marg desc-right t-bl-vid">--}}
        {{--<div class="desc full-desc-th">--}}
            {{--<div class="desc-opacity">--}}
                {{--<h3><span>3</span> constitution draft</h3>--}}
                {{--<div>--}}
                    {{--To provide a minimum living wage to every person from birth until death.--}}
                    {{--To remove dependence of people on--}}
                    {{--the currently existing financial system,--}}
                    {{--which, in turn, would make impossible--}}
                    {{--the processes of inflation, unaccounted--}}
                    {{--money issue, any financialcrises. The--}}
                    {{--system should completely exclude the--}}
                    {{--physical loss of the money--}}
                {{--</div>--}}
                {{--<a class="read_more" href=""><span class="hidden-820">Read more</span><span class="hidden-1920 show-820">MORE</span></a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="clearfix"></div>--}}
    {{--<div class="col-md-4 col-sm-6 desc-marg fo-bl-vid">--}}
        {{--<div class="desc full-desc-fourth">--}}
            {{--<div class="desc-opacity">--}}
                {{--<h3><span>4</span> faq</h3>--}}
                {{--<div>--}}
                    {{--To provide a minimum living wage to every person from birth until death.--}}
                    {{--To remove dependence of people on--}}
                    {{--the currently existing financial system,--}}
                    {{--which, in turn, would make impossible--}}
                    {{--the processes of inflation, unaccounted--}}
                    {{--money issue, any financialcrises. The--}}
                    {{--system should completely exclude the--}}
                    {{--physical loss of the money--}}
                {{--</div>--}}
                {{--<a class="read_more"  href=""><span class="hidden-820">Read more</span><span class="hidden-1920 show-820">MORE</span></a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-4 col-sm-6 desc-marg desc-center fi-bl-vid">--}}
        {{--<div class="desc full-desc-fifth">--}}
            {{--<div class="desc-opacity">--}}
                {{--<h3><span>5</span> action plan</h3>--}}
                {{--<div>--}}
                    {{--To provide a minimum living wage to every person from birth until death.--}}
                    {{--To remove dependence of people on--}}
                    {{--the currently existing financial system,--}}
                    {{--which, in turn, would make impossible--}}
                    {{--the processes of inflation, unaccounted--}}
                    {{--money issue, any financialcrises. The--}}
                    {{--system should completely exclude the--}}
                    {{--physical loss of the money--}}
                {{--</div>--}}
                {{--<a class="read_more"  href=""><span class="hidden-820">Read more</span><span class="hidden-1920 show-820">MORE</span></a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-4 col-sm-6 desc-marg desc-right sx-bl-vid">--}}
        {{--<div class="desc full-desc-sixth">--}}
            {{--<div class="desc-opacity">--}}
                {{--<h3><span>6</span> what to do?</h3>--}}
                {{--<div>--}}
                    {{--To provide a minimum living wage to every person from birth until death.--}}
                    {{--To remove dependence of people on--}}
                    {{--the currently existing financial system,--}}
                    {{--which, in turn, would make impossible--}}
                    {{--the processes of inflation, unaccounted--}}
                    {{--money issue, any financialcrises. The--}}
                    {{--system should completely exclude the--}}
                    {{--physical loss of the money--}}
                {{--</div>--}}
                {{--<a class="read_more"  href=""><span class="hidden-820">Read more</span><span class="hidden-1920 show-820">MORE</span></a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="desc-men"><img src="../img/men.png"/></div>--}}
    {{--<div class="clearfix"></div>--}}
    {{--<div class="container-title hidden-sm hidden-xs"><h3><span>Full description of the project</span></h3></div>--}}

{{--</div>--}}
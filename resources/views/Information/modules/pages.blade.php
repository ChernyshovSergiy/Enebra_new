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
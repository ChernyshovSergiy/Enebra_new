<div class="container-fluid full-desc-of-project">
    <div class="container-title hidden-md hidden-lg"><h3><span>@lang('index.full_description')</span></h3></div>
    <div class="clearfix"></div>

    @foreach( $pages -> chunk( 3 ) as $element )
        @foreach( $element as $k => $page )
            <div onclick="window.location.href='{{ $page->title->url }}'" class="col-md-4 col-sm-6 desc-marg description-{{$k + 1}} bl-vid-{{($k + 1)}}">
                <div class="desc full-desc-{{($k + 1)}}">
                    <div class="desc-opacity">
                        <h3><span>{{($k + 1)}}</span>{{$page->getTitle()}}</h3>
                        <div>{!! str_limit($page->text->text_description->$cur_lang, 400) !!}</div>
                        <a class="read_more" href="{{ $page->title->url }}"><span class="hidden-820">@lang('app.read_more')</span><span class="hidden-1920 show-820">@lang('app.more')</span></a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="clearfix"></div>
    @endforeach

    <div class="desc-men"><img src="{{ asset('img/men.png')}}"/></div>
    <div class="clearfix"></div>
    <div class="container-title hidden-sm hidden-xs"><h3><span>@lang('index.full_description')</span></h3></div>

</div>
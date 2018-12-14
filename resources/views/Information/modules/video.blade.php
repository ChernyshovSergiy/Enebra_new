<div class="container-fluid video" id="scroll-video">

    <div class="container vid-zag">
        <h1 class="into-h1">
            <span class="big">@lang('app.video')</span>
            <span class="zagolovok">@lang('app.video')</span>
        </h1>
    </div>
    <div id="responsive-example-container">
        <div class="">
            @foreach( $video_groups -> chunk( 2 ) as $key => $groups )
                <div class="kw-block kwicks kwicks-horizontal kwicks-processed">
                    @foreach( $groups as $k => $group)
                        {{--{{ dd($group->getBG()) }}--}}
                        <div class="video-block col-md-3 {{ $group->getBG() }}">
                            {{--<div class="title">{{ json_decode($group->menu->title)->$cur_lang }}</div>--}}
                            <div class="title">{{ $group->getTitle() }}</div>
                            <div class="block-on-hover">
                                <a href="{{$group->menu->url }}">
                                    <h2>{{ $group->getTitle() }}</h2>
                                </a>
                                <p>{!! htmlspecialchars_decode( $group->content->description->$cur_lang ) !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
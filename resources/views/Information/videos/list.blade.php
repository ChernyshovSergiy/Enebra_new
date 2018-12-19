@extends('layouts.information')

@section('content')

    @include( 'Information.common.nav')

    <div class="span-medit video-top-txt">{!! htmlspecialchars_decode ( $video_group->content ? $video_group->content->description->$cur_lang : '') !!}</div>

    @if( $video_group->video_group_sections->count() > 0)
        {{--{{dd($video_group->video_group_sections)}}--}}
        @foreach( $video_group->video_group_sections as $separator => $group)
            {{--{{dd($group->videos)}}--}}
            <div class="vid-full-block top">
                @if( $separator % 2  !== 0)
                    <div class="bottom-shadow-block infov">
                @endif
                    <h2 class="h2-inf container">{{ json_decode($group->title)->$cur_lang }}</h2>
                    @foreach( $group->videos->chunk(2) as $block )
                        @include( 'Information.videos.videos' )
                    @endforeach
                @if( $separator % 2  !== 0)
                    </div>
                @endif
            </div>
        @endforeach
    @else
        <div class="vid-full-block top">
            @foreach( $video_group->videos->chunk(2) as $block )
                @include( 'Information.videos.videos' )
            @endforeach
        </div>
    @endif
@endsection
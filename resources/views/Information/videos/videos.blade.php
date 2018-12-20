@foreach( $block as $element )
    @php($key = $element->sort)
    @php($element = json_decode($element->info))
    @if( $key % 2  !== 0)
        <div class="vid-block">
            <div class="col-sm-5 col-xs-12 custom-float padding-left">
                <h1 class="into-h1 videos-h1">
                    <span class="big">{{ $element->title->$cur_lang }}</span>
                    <span class="zagolovok">{{ $element->title->$cur_lang }}</span>
                </h1>
                <h3>{!! htmlspecialchars_decode(  $element->description->$cur_lang) !!}</h3>
                <p class="span-med hidden-xs font-16 ">{!! htmlspecialchars_decode( $element->about_author->$cur_lang) !!}</p>
            </div>
            <div class="col-sm-7 col-xs-12 ">
                <div class="img-wrapper videos-img">
                    <a href="{{ $element->link->$cur_lang }}" target="_blank">
                        <img class="v-play" src="{{ asset( 'img/videos/vid-play.png') }}" />
                    </a>
                    <img class="img-responsive" src="{{ $element->image_id->$cur_lang }}" />
                    <span class="v-time span-med">{{ $element->duration_time->$cur_lang }}</span>
                </div>
                {{--<p class="span-med hidden-sm hidden-md hidden-lg font-16">{!! htmlspecialchars_decode( $element->about_author->$cur_lang) !!}</p>--}}
            </div>
            <div class="clearfix"></div>
        </div>
    @else
        <div class="vid-block sec">
            <div class="col-sm-5 col-xs-12 align-right ">
                <h1 class="into-h1 videos-h1">
                    <span class="big line">{{ $element->title->$cur_lang }}</span>
                    <span class="zagolovok">{{ $element->title->$cur_lang }}</span>
                </h1>
                <h3>{!! htmlspecialchars_decode(  $element->description->$cur_lang) !!}</h3>
                <p class="span-med hidden-xs font-16">{!! htmlspecialchars_decode( $element->about_author->$cur_lang ) !!}</p>
            </div>
            <div class="col-sm-7">
                <div class="img-wrapper videos-img">
                    <a target="_blank" href="{{ $element->link->$cur_lang }}">
                        <img class="v-play" src="{{ asset( 'img/videos/vid-play.png') }}" />
                    </a>
                    <img class="img-responsive" src="{{  $element->image_id->$cur_lang }}"/>
                    <span class="v-time span-med">{{ $element->duration_time->$cur_lang }}</span>
                </div>
                {{--<p class="span-med hidden-sm hidden-md hidden-lg font-16">{!! htmlspecialchars_decode( $element->about_author->$cur_lang ) !!}</p>--}}
            </div>
            <div class="clearfix"></div>
        </div>
    @endif
@endforeach

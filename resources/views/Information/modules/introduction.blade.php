<div class="parallax-container" data-parallax="scroll" data-bleed="10" data-speed="0.2" data-image-src="{{asset('/img/intro.png')}}" data-natural-width="1920" data-natural-height="1162">

    <div class="bl"></div>

    <div class="intro-desc" id="scroll-introduction" >

        <div class="container">

            <h1 class="into-h1">


                <span class="big">{{$introduction->getTitleFromMenu()}}</span>

                <span class="zagolovok">{{$introduction->getTitleFromMenu()}}</span>

            </h1>

            <h2><span style='padding-left:60px;'> </span>{!! substr($introduction->content->sub_title->$cur_lang, 3, -4) !!}</h2>

            <p class="col-md-9 col-sm-12 col-xs-12 light-text">{!!  substr($introduction->content->text->$cur_lang, 3, -4)  !!}
            </p>
            {{--<br/><br/>--}}

            <div class="clearfix"></div>

            <div class="italic-text col-md-9  col-sm-12 col-xs-12">{!! substr($introduction->content->replica->$cur_lang, 3, -4) !!}</div>
        </div>
    </div>
</div>
<div class="container-fluid auth">
    <div class="col-md-3 col-sm-3 auth photo">
        <div class="author">
            <img class="img-responsive" src="{{asset('img/author.png')}}" style="border-radius: 500px; box-shadow: 10px 10px 30px -11px rgba(0,0,0,0.75); width: 90%;"/>
            <span>@lang('app.sergey')<br />@lang('app.author')</span>
        </div>
    </div>

    <div class="col-md-9 col-sm-9 auth-left-txt">
        <div class="intro-list">
            <ul>

                @foreach( $introduction_points  as $point )

                    <li><a href="{{$point->menu->url}}">{!! substr($point->point->$cur_lang, 3, -4 ) !!}</a></li>

                @endforeach
            </ul>
            <p>{!! substr( $introduction->content->conclusion->$cur_lang, 3, -4 ) !!}</p>

        </div>
    </div>
    <div class="clearfix"></div>
    <div class="auth-bottom"></div>

</div>



<div class="clearfix"></div>
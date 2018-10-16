<div class="parallax-container" data-parallax="scroll" data-bleed="10" data-speed="0.2" data-image-src="{{asset('/img/intro.png')}}" data-natural-width="1920" data-natural-height="1162">

    <div class="bl"></div>

    <div class="intro-desc" id="scroll-introduction" >

        <div class="container">

            <h1 class="into-h1">

                {{--<span class="big">{{$locale -> introduction -> title}}</span>--}}

                {{--<span class="zagolovok">{{$locale -> introduction -> title}}</span>--}}

            </h1>

            {{--<h2>{!! htmlspecialchars_decode( $locale -> introduction -> question ) !!}</h2>--}}

            {{--<p class="col-md-9 col-sm-12 col-xs-12 light-text">{!! htmlspecialchars_decode( $locale -> introduction -> description ) !!}</p>--}}

            <br/><br/>

            <div class="clearfix"></div>

            {{--<div class="italic-text col-md-9  col-sm-12 col-xs-12">{!! htmlspecialchars_decode( $locale -> introduction -> afterdescription ) !!}</div>--}}
        </div>
    </div>
</div>
<div class="container-fluid auth">
    <div class="col-md-3 col-sm-3 auth photo">
        <div class="author">
            <img class="img-responsive" src="{{asset('img/author.png')}}"/>
            <span>@lang('app.sergey')<br />@lang('app.author')</span>
        </div>
    </div>

    <div class="col-md-9 col-sm-9 auth-left-txt">
        <div class="intro-list">
            <ul>

                {{--@foreach( $locale -> introduction -> rules as $rule )--}}

                    {{--<li><a href="{{$rule -> link}}">{{$rule -> rule}}</a></li>--}}

                {{--@endforeach--}}
            </ul>
            {{--<p>{!! htmlspecialchars_decode( $locale -> introduction -> afterrules ) !!}</p>--}}

        </div>
    </div>
    <div class="clearfix"></div>
    <div class="auth-bottom"></div>

</div>



<div class="clearfix"></div>
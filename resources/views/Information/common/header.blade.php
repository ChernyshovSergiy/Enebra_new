<header>

    <nav class="navbar" id="head-nav">

        <div class="container-fluid">

            <div class="navbar-header col-sm-5">

                <a class="navbar-brand hidden-820" href="/">

                    <img class="img-responsive" src="{{asset( 'img/logo.png' ) }}"/>

                    <div class="logo-text">

                        <div class="big-txt"><img src="{{asset( 'img/the.png' ) }}"/></div>

                        <div class="small-txt">

                            <div class="med-small-txt"><span> @lang('app.enebra')</span> @lang('app.project')</div>

                            <hr class="bord-txt"/>

                            <div class="min-small-txt">@lang('app.key_to_prosperity')<span> @lang('app.human')</span></div>

                        </div>

                    </div>

                </a>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            @if($myNav)

                <div class="navbar-collapse collapse col-sm-4">
                    <ul class="nav navbar-nav custom-menu">
                        @include('Information.modules.customMenuItems', ['items'=>$myNav->roots()])
                    </ul>
                </div>

            @endif

            {{--<div class="navbar-collapse collapse col-sm-4">--}}

                {{--<ul class="nav navbar-nav custom-menu">--}}

                    {{--<li class="home hidden-820 "><a href="{{asset( '/' ) }}"><span></span></a></li>--}}

                    {{--<li class="dropdown">--}}
                        {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="glyphicon glyphicon-chevron-down"></span>--}}
                        {{--</a>--}}
                        {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#">@lang('nav.about') <span class="glyphicon glyphicon-chevron-down"></span>--}}
                        {{--</a>--}}

                        {{--<ul class="dropdown-menu">--}}
                        {{----}}

                            {{--<li><a href="/#scroll-introduction" onclick="scroll_to('scroll-introduction')">@lang('app.introduction')</a>--}}

                            {{--@foreach( $locale -> pages as $page )--}}

                                {{--<li><a href="{{ asset( 'information/' . $page -> slug ) }}">{{ $page -> title}}</a></li>--}}

                            {{--@endforeach--}}

                            {{--<li class = "dropdown-submenu"><a tabindex="-1" href="/#scroll-video" onclick="scroll_to('scroll-video')">@lang('nav.video') <span class="glyphicon glyphicon-chevron-right"></span></a>--}}

                                {{--<ul class="dropdown-menu" role = "menu">--}}

                                    {{--@foreach( $locale -> videogroups as $group )--}}

                                        {{--<li><a tabindex="-1" href="{{ asset('video/' . $group -> slug ) }}">{{ $group -> title }}</a></li>--}}

                                    {{--@endforeach--}}

                                {{--</ul>--}}

                                {{--<!----}}

                                    {{--<li class = "dropdown-submenu"><a tabindex="-1" href="#">Documents   <span class="glyphicon glyphicon-chevron-right"></span></a>--}}
                                                    {{--<ul class="dropdown-menu" role = "menu">--}}
                                                        {{--<li><a tabindex="-1" href="/">The Draft of the Constitution</a></li>--}}
                                                        {{--<li><a tabindex="-1" href="/">The Draft of the Laws</a></li>--}}
                                                        {{--<li><a tabindex="-1" href="/">Open Letters</a></li>--}}
                                                         {{--<li class = "dropdown-submenu"><a tabindex="-1" href="#">Decisions   <span class="glyphicon glyphicon-chevron-right"></span></a>--}}
                                                            {{--<ul class="dropdown-menu" role = "menu">--}}
                                                                {{--<li><a tabindex="-1" href="/">Archive of taken decisions </a></li>--}}
                                                                {{--<li><a tabindex="-1" href="/">Archive of denied (cancelled) decisions</a></li>--}}
                                                            {{--</ul>--}}
                                                        {{--</li>--}}
                                                    {{--</ul>--}}
                                                {{--</li>--}}
                                {{---->--}}
                        {{--</ul>--}}

                    {{--</li>--}}


                    {{--<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">@lang('nav.community') <span class="glyphicon glyphicon-chevron-down"></span></a>--}}

                        {{--<ul class="dropdown-menu">--}}

                            {{--<li><a href="{{ asset('participants') }}">@lang('nav.participants')</a></li>--}}

                            {{--<li><a href="{{ asset('publications') }}">@lang('nav.publications')</a></li>--}}

                            {{--<li><a href="{{ asset('forum') }}">@lang('nav.forum')</a></li>--}}

                            {{--<li><a href="{{ asset('news') }}">@lang('nav.news')</a></li>--}}

                            {{--<li><a href="{{ asset('information/faq') }}">@lang('nav.faq')</a></li>--}}

                        {{--</ul>--}}
                    {{--</li>--}}
                {{--</ul>--}}

            {{--</div>--}}



            <div class="nav-right-menu-full col-sm-3">

                <div class="nav-right-menu">

                    <ul class="nav navbar-nav custom-menu register-menu">

                        <li>

                            <div class="input-group search-block">

                                <input type="text" class="search-query form-control" />

                                <span class="input-group-btn search-btn">

                                    <button class="btn" type="button">

                                        <span class=" glyphicon glyphicon-search"></span>

                                    </button>

                                </span>

                                <div class="hidden-820">

                                    {{--@if( $auth === true)--}}

                                        <span role="button" onclick="window.location.href='{{asset('account/feed')}}'">@lang('nav.profile')</span>

                                        <span role="button" onclick="auth.logout()">@lang('nav.logout')</span>

                                    {{--@else--}}

                                        <span class="signbutton">@lang('nav.signin')</span> @lang('nav.or')

                                        <span class="regbutton">@lang('nav.signup')</span>

                                    {{--@endif--}}

                                </div>

                            </div>
                        </li>

                    </ul>

                    <ul class="nav navbar-nav custom-menu mobile">

                        {{--@if( $auth === true)--}}

                        {{--@else--}}
                            <li class="dropdown lang">

                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">@lang('nav.language')
                                    {{--<img class="flag" src="{{ asset('img/flags/' . $locale['slug'] . '.png')}}"/>--}}
                                    <span class="glyphicon glyphicon-chevron-down"></span>
                                </a>

                                <ul class="dropdown-menu">

                                    {{--@foreach( $languages as $language )--}}

                                        {{--<li>--}}

                                            {{--<a href="#" onclick="change_language('{{$language -> slug}}')">--}}
                                                {{--<img src='{{asset( "img/flags/" . $language -> slug . ".png" ) }}'/>--}}
                                            {{--</a>--}}

                                        {{--</li>--}}

                                    {{--@endforeach--}}
                                </ul>

                                <div class="languages">

                                    <div id="owl-example" class="owl-carousel">


                                        {{--@foreach( $languages as $language )--}}

                                            {{--<div>--}}

                                                {{--<a href="#" onclick="change_language('{{$language -> slug}}')">--}}
                                                    {{--<img src='{{asset( "img/flags/" . $language -> slug . ".png" ) }}'/>--}}
                                                {{--</a>--}}

                                            {{--</div>--}}

                                        {{--@endforeach--}}

                                    </div>

                                </div>
                            </li>


                            <li class="dropdown sign-button hidden-1920 show-820">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <img class="mob-sign" src="{{asset( 'img/mobile-sign.png' ) }}"/>
                                </a>
                            </li>

                        {{--@endif--}}
                    </ul>



                    <div class="clearfix"></div>

                </div>

            </div>

        </div>

    </nav>

</header>
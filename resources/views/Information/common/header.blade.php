<header>
    <nav class="navbar" id="head-nav">
        <div class="container-fluid">
            <div class="navbar-header col-sm-5">
                <a class="navbar-brand hidden-820" href="/">
                    <img class="img-responsive" src="{{asset( 'img/logo-f.png' ) }}" width="70"/>
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
        <!-- Navigation menu -->
            @if($myNav)
                <div class="navbar-collapse collapse col-sm-4">
                    <ul class="nav navbar-nav custom-menu">
                        @include('Information.modules.customMenuItems', ['items'=>$myNav->roots()])
                    </ul>
                </div>
            @endif
        <!-- ./Navigation menu -->
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
                                    @if(Auth::check())
                                        <span role="button" onclick="window.location.href='{{asset('account/feed')}}'">@lang('nav.profile')</span>
                                        <span role="button" onclick="auth.logout()">@lang('nav.logout')</span>
                                    @else
                                        <span class="signbutton">@lang('nav.signin')</span> @lang('nav.or')
                                        <span class="regbutton">@lang('nav.signup')</span>
                                    @endif
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav custom-menu mobile">
                        {{--@if(Auth::check())--}}

                        {{--@else--}}
                            <li class="dropdown lang">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">@lang('nav.language')
                                    <img class="flag" src="{{ asset('uploads/flags_svg/'.LaravelLocalization::getCurrentLocale().'.svg') }}" alt="">
                                    {{ LaravelLocalization::getCurrentLocaleNative() }}
                                    <span class="glyphicon glyphicon-chevron-down"></span>
                                </a>
                                <ul class="dropdown-menu"  style="background: 37px 30px; padding: 0px 0;">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        @if(LaravelLocalization::getCurrentLocale() != $localeCode)
                                            <li>
                                                <a style="padding: 0px 0px;" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                    <img src="{{ asset('uploads/flags_svg/'.$localeCode.'.svg') }}" alt="">
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                <div class="languages">
                                    <div id="owl-example" class="owl-carousel">
                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            @if(LaravelLocalization::getCurrentLocale() != $localeCode)
                                                <div>
                                                    <a  hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                        <img src="{{ asset('uploads/flags_svg/'.$localeCode.'.svg') }}" alt="">
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
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
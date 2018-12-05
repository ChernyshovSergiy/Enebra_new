<div class="f-block">

    @include( 'Information.modules.timer')

    <div class="navbar-header">

        <a class="navbar-brand hidden-1920 show-820" href="/">

            <img class="img-responsive" src="{{ asset( 'img/logo-f.png') }}"/>

            <div class="logo-text">

                <div class="big-txt"><img src="{{ asset( 'img/the.png') }}"/></div>

                <div class="small-txt">

                    <div class="med-small-txt"><span>@lang('app.enebra')</span> @lang('app.project')</div>

                    <hr class="bord-txt"/>

                    <div class="min-small-txt">@lang('app.key_to_prosperity')<span> @lang('app.human')</span></div>

                </div>

            </div>
        </a>

    </div>

    <h2><span class="blue">@lang('index.free')</span> @lang('index.community')</h2>

    <h3>@lang('index.citizens') <span class="blue">@lang('index.of_earth_planet')</span></h3>

    <a class="how_start hvr-radial-out" href="#" onclick="scroll_to('scroll-introduction')">@lang('index.how_to_start')</a>
</div>
                
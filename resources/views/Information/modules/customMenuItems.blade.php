@foreach($items as $item)
    @if($item->title === 'home')
        @if(LaravelLocalization::getCurrentLocale() !== 'en')
             <li
                class="home hidden-820 {{ URL::current() === env('THEME').'/'.LaravelLocalization::getCurrentLocale().substr($item->url(),2) ? 'active': '' }}">
        @else
             <li
                class="home hidden-820 {{ URL::current() === env('THEME').substr($item->url(),2) ? 'active': '' }}">
        @endif
            <a href="{{ substr($item->url(),1) }}">
                <span></span>
            </a>
        </li>
    @else
        @if( $item->hasChildren())
            @if($item->parent == 0)
                <li class="dropdown">
                    {{--<a class="dropdown-toggle" data-toggle="dropdown" href="{{ asset(env('THEME').LaravelLocalization::getCurrentLocale().substr($item->url(),1)) }}">@lang('nav.'.$item->title)--}}
                    <a class="dropdown-toggle" data-toggle="dropdown" href="{{ asset(substr($item->url(),1)) }}">{{$item->title}}
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
            @else
                <li class = "dropdown-submenu">
                    @if(substr($item->url(),1,8) !== '/#scroll')
                        {{--<a class="dropdown-toggle" data-toggle="dropdown" href="{{ env('THEME').LaravelLocalization::getCurrentLocale().substr($item->url(),1) }}">@lang('nav.'.$item->title)--}}
                        <a class="dropdown-toggle" data-toggle="dropdown" href ="{{ $item->url }}">{{$item->title}}
                    @else
                        <a tabindex="-1" href="{{substr($item->url(),1)}}" onclick="scroll_to({{substr($item->url(),3)}})">{{$item->title}}
                    @endif
                        <span class="glyphicon glyphicon-chevron-right"></span></a>
            @endif
            <ul class="dropdown-menu">
                @include('Information.modules.customMenuItems', ['items'=>$item->children()])
            </ul>
        @else
            <li class="dropdown" onclick="window.location.href ='{{ substr($item->url(),1) }}'">
                @if(substr($item->url(),1,8) !== '/#scroll')
                    {{--<a class="dropdown-toggle" data-toggle="dropdown" href="{{ env('THEME').LaravelLocalization::getCurrentLocale().substr($item->url(),1) }}">@lang('nav.'.$item->title)</a>--}}
                    <a class="dropdown-toggle" data-toggle="dropdown" href ="{{ $item->url }}">{{$item->title}}</a>
                @else
                    <a tabindex="-1" href="{{substr($item->url(),1)}}" onclick="scroll_to({{substr($item->url(),3)}})">{{$item->title}} </a>
                @endif
            </li>
        @endif
    @endif

@endforeach
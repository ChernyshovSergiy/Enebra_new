@foreach($items as $item)
    {{--class="home hidden-820 active--}}
    {{--<li {{(URL::current() == $item->url() ? "class=current_page_item": "")}}>--}}
    @if($item->title == 'home')
        {{--<li {{(URL::current() == 'https://localhost:8080/ru' ? "class=home hidden-820 active": "class=home hidden-820")}}><a href="{{ $item->url() }}"><span></span></a></li>--}}
        {{--{{ dd(URL::current()) }}--}}
        <li class="home hidden-820 active"><a href="{{ env('THEME').LaravelLocalization::getCurrentLocale().substr($item->url(),1) }}"><span></span></a></li>
    @else
        @if( $item->hasChildren())
            @if($item->parent == 0)
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="{{ env('THEME').LaravelLocalization::getCurrentLocale().substr($item->url(),1) }}">{{ $item->title }}
                        <span class="glyphicon glyphicon-chevron-down"></span></a>
            @else
                <li class = "dropdown-submenu">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="{{ env('THEME').LaravelLocalization::getCurrentLocale().substr($item->url(),1) }}">{{ $item->title }}
                        <span class="glyphicon glyphicon-chevron-right"></span></a>
            @endif
            <ul class="dropdown-menu">
                @include('Information.modules.customMenuItems', ['items'=>$item->children()])
            </ul>
        @else
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="{{ env('THEME').LaravelLocalization::getCurrentLocale().substr($item->url(),1) }}">{{ $item->title }}</a>

        </li>
        @endif
    @endif

@endforeach
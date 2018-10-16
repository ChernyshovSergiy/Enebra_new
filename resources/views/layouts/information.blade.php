<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    @include( 'Information.common.head' )

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    {{--<script src="{{ asset( 'js/jquery-ui.js' ) }}"></script>--}}

</head>

<body class="{{$status}}" id="body">

    @include('vendor.loader')
    <div href="#" id="go-to-top" onclick="scroll_to('body')" ></div>

    <div class="wrapper">

        @yield('content')


    </div>


    {{--@include( 'Information.common.footer' )--}}

    {{--@include( 'Information.modals.answer' )--}}


<script src="{{ asset( 'js/frontend.js' ) }}"></script>
<script>
    $(function() {
        $('body').vegas({
            slides: [
                { src: '/img/bgint.png' },
                { src: '/img/bg.png' },
                { src: 'img3.jpg' }
            ],
            // overlay: '/overlays/03.png'
        });
    });
</script>

</body>
</html>
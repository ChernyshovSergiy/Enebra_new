<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <head>
        @include( 'Information.common.head' )
    </head>

    <body class="{{$status}}" id="body">
        {{--<div id="app">--}}

            {{--<elevator-component></elevator-component>--}}

            {{--@include('vendor.loader')--}}
            {{--<div href="#" id="go-to-top" onclick="scroll_to('body')" ></div>--}}

            <div class="wrapper">

                @yield('content')

            </div>
        {{--</div>--}}


        {{--@include( 'Information.common.footer' )--}}

        {{--@include( 'Information.modals.answer' )--}}

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        {{--<script src="{{ asset( 'js/app.js' ) }}"></script>--}}
        <script src="{{ asset( 'js/frontend.js' ) }}"></script>

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>

        <script src="https://maps.googleapis.com/maps/api/js?v=3.21&key=AIzaSyDuobmu5uxO3e-AsgdFVa2LoDA32fPagks&language=en" type="text/javascript"></script>

    </body>
</html>
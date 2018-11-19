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
                @if(session('status'))
                    <!-- .modal-content -->
                        <div class="modal fade" id="modal-default">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">{{ session('status') }}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>{{ session('status') }}&hellip;</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" data-dismiss="modal">Ok</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                @endif

            </div>
        {{--</div>--}}


        @include( 'Information.common.footer' )

        {{--@include( 'Information.modals.answer' )--}}

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        {{--<script src="{{ asset( 'js/app.js' ) }}"></script>--}}
        <script src="{{ asset( 'js/frontend.js' ) }}"></script>

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>

        <script src="https://maps.googleapis.com/maps/api/js?v=3.21&key=AIzaSyDuobmu5uxO3e-AsgdFVa2LoDA32fPagks&language=en" type="text/javascript"></script>

    </body>
</html>
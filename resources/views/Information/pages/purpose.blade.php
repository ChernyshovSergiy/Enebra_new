@extends('layouts.information')
@section('content')
    @include( $information . '.common.nav')
    @include( $information . '.partials.breadcrumb' )

    <table class="full-equal purpose">
        <tbody>
        <tr>
            <td class="equal-blocks top">
                <ul>
                    {{--@for( $i = 0; $i < intval( count( $page -> purposerules ) / 2 ) ; $i++)--}}
                        {{--<li><span>{{$page -> purposerules[$i] -> rule}}</span></li>--}}
                    {{--@endfor--}}
                </ul>
                <div class="next-block">
                    <a href="#" onclick="scroll_to('scroll-next-block')" class="next">{{Lang::get('app.next')}}</a>
                </div>
            </td>
            <td class="equal-blocks top right-purp" id="scroll-next-block">
                <ul>
                    {{--@for( $i = intval( count( $page -> purposerules ) / 2 ); $i < intval( count( $page -> purposerules ) ) ; $i++)--}}
                        {{--<li><span>{{$page -> purposerules[$i] -> rule}}</span></li>--}}
                    {{--@endfor--}}
                </ul>
            </td>
        </tr>
        </tbody>
    </table>

    @include( $information . '.partials.description')
    @include( $information . '.partials.shared' )
@endsection
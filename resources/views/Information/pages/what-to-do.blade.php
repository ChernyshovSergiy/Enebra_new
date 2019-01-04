@extends('layouts.information')
@section('content')
    @include( 'Information.common.nav')
    @include( 'Information.partials.top_info_line' )

    <table class="full-equal what-do-full">
        <tbody>
        <tr>
            <td class=" equal-blocks top" >
                <ul>
                    {{--@foreach( $page->title->what_to_do_points(0)->get() as $key =>  $point)--}}
                    @foreach( $page->title->what_to_do_points()->where('side', '=', 0)->get()->sortBy('sort') as $key =>  $point)
                        <li><span>{!! htmlspecialchars_decode( json_decode($point->point)->$cur_lang) !!}</span></li>
                        @if( $key === 2 )
                            <div class="inside-block">{!! htmlspecialchars_decode( $page->text->left_textarea->$cur_lang) !!}</div>
                        @endif
                    @endforeach
                </ul>
                <div class="next-block"><a href="#" onclick="scroll_to('scroll-to-do')" class="next">@lang('app.next')</a></div>
            </td>
            <td class="equal-blocks top what-do" id="scroll-to-do">
                <div class="inside-block right">{!! htmlspecialchars_decode( $page->text->right_textarea->$cur_lang) !!}</div>
                <ul>
                    @foreach( $page->title->what_to_do_points()->where('side', '=', 1)->get()->sortBy('sort') as $key =>  $point)
                        <li><span></span>{!! htmlspecialchars_decode( json_decode($point->point)->$cur_lang) !!}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
        </tbody>
    </table>
    @include('Information.partials.description')
    @include('Information.partials.shared')
@endsection


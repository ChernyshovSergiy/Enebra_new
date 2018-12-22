@extends('layouts.information')
@section('content')
    @include( 'Information.common.nav')
    @include( 'Information.partials.top_info_line' )

    <table class="full-equal purpose">
        <tbody>
        <tr>
            <td class="equal-blocks top">
                <ul>
                    @for( $i = 0; $i < count( $page->title->purpose) / 2 ; $i++)
                        <li><span>{!! json_decode($page->title->purpose[$i]->goal)->$cur_lang !!}</span></li>
                    @endfor
                </ul>
                <div class="next-block">
                    <a href="#" onclick="scroll_to('scroll-next-block')" class="next">@lang('app.next')</a>
                </div>
            </td>
            <td class="equal-blocks top right-purp" id="scroll-next-block">
                <ul>
                    @for( $i = count($page->title->purpose) / 2, $iMax = count($page->title->purpose) ; $i < $iMax ; $i++)
                        <li><span>{!! json_decode($page->title->purpose[$i]->goal)->$cur_lang !!}</span></li>
                    @endfor
                </ul>
            </td>
        </tr>
        </tbody>
    </table>

    @include('Information.partials.description')
    @include('Information.partials.shared' )
@endsection
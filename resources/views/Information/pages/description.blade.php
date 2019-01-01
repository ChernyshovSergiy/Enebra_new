@extends('layouts.information')
@section('content')
    @include( 'Information.common.nav')
    @include( 'Information.partials.top_info_line' )

    <div class="col-md-12 col-sm-12">
        <div class="const-txt txt-descr">
            <div class="col-md-6 col-sm-12 txt-auth">
                {!! htmlspecialchars_decode( $page->text->top_textarea->$cur_lang ) !!}
            </div>
            <div class="col-md-6 col-sm-12 photo-foster">
                <img class="img-responsive" src="{{ asset( 'uploads/' . $page->images->image_category->title.'/'. $page->images->image) }}">
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <table class="full-equal constitution descript">
        <tbody>
        @foreach( $page->title->desc_block->chunk( 2 ) as $key => $block)
            <tr>
                @foreach( $block as $k => $element)
                    @if( $k %2 === 0)
                        <td class=" equal-blocks" id="block-{{$k}}">
                            @foreach( $element->description->sortBy('sort') as $block )
                                @include( 'Information.pages.description_text' )
                            @endforeach
                            <div class="next-block">
                                <a href="#" onclick="scroll_to('block-{{$k}}')" class="next">@lang('app.next')</a>
                            </div>
                        </td>
                    @else
                        <td class=" equal-blocks" id="block-{{$k}}">
                            @foreach( $element->description->sortBy('sort') as $block )
                                @include( 'Information.pages.description_text' )
                            @endforeach
                            @if( ( $key + 1 )  !== $page->title->desc_block->chunk( 2 )->count() )
                                <div class="next-block">
                                    <a href="#" onclick="scroll_to('block-{{$k + 1}}')" class="next sec">@lang('app.next')</a>
                                </div>
                            @endif
                        </td>
                    @endif
                @endforeach
            </tr>
            @if( $key === 1 )
                <tr>
                    <td colspan="2" class="equal-blocks full-w">{!! $page->text->sub_title->$cur_lang !!}</td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>

    @include('Information.partials.description')
    @include('Information.partials.shared' )
@endsection

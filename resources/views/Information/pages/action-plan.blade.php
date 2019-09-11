@extends('layouts.information')
@section('content')
    @include( 'Information.common.nav')
    @include( 'Information.partials.top_info_line' )

    <div class="col-md-12 col-sm-12 actionpl">
        <div class="const-txt">
            <div class="h2">{!! htmlspecialchars_decode( $page->text->top_textarea->$cur_lang ) !!}</div>
        </div>
    </div>
    <table class="full-equal constitution action">
        <tbody>
        @php($phases = App\Models\Inf_plan_phase::all())
        @foreach( $phases->chunk( 2 ) as $ph => $phase)
            <tr>
                @foreach( $phase as $key => $element)
                    <td class="equal-blocks bl-{{$key}}" id="plan-scroll-{{$key}}">
                        <div class="h3">{!! json_decode($element->title)->$cur_lang !!}</div>
                        <div class="bord-hidden">
                            <div class="border-left">
                                @php($sections = App\Models\Inf_plan_phase_section::all())
                                @foreach( $sections as $k => $section)
                                    <div class="acc-full">
                                        <div class="accord-block inf-section section-background-{{$section -> id}}">
                                            <h4>{!! json_decode($section->sub_title)->$cur_lang !!}</h4>
                                            <div class="panel-group" id="accordion{{($key + 1) + ( $k + 1) }}">
                                                @php($points = App\Models\Inf_plan_section_point::wherePhaseId($element->id)->where('section_id','=', $section->id)->get())
                                                @foreach( $points as $p => $point )
                                                    @php($item = json_decode($point->entry))
                                                    <div class="panel panel-default {{$item->description->$cur_lang === null ? ' empty': ''}}">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionaccordion{{($key + 1) + ( $k + 1)}}" href="#collapse{{ $point->id}}">
                                                                    @if($point->is_done === 1)
                                                                        <img src="{{ asset( 'uploads/info_page_icon_svg/check-box-done.svg' )}}" alt="" width="28">&nbsp;
                                                                    @else
                                                                        <img src="{{ asset( 'uploads/info_page_icon_svg/check-box.svg' ) }}" alt="" width="20"> &nbsp;&nbsp;
                                                                    @endif
                                                                    {{$p+1 .') '.$item->point->$cur_lang}}
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        @if($item->description->$cur_lang !== null)
                                                            <div id="collapse{{$point->id}}" class="panel-collapse collapse in">
                                                                <div class="panel-body">{!! htmlspecialchars_decode( $item->description->$cur_lang ) !!}</div>
                                                            </div>
                                                        @else
                                                            {{--<div id="collapse{{$point->id}}" class="panel-collapse collapse">--}}
                                                                {{--<div class="panel-body">{!! htmlspecialchars_decode( $item->description->$cur_lang) !!}</div>--}}
                                                            {{--</div>--}}
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="next-block">
                            <a href="#"onclick="scroll_to('plan-scroll-{{$key + 1}}')" class="next
                                @if( $key % 2 !== 0) sec
                                @endif">
                                @lang('app.next')
                            </a>
                        </div>
                    </td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
    @include('Information.partials.shared')
@endsection

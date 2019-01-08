@extends('layouts.information')
@section('content')
    @include( 'Information.common.nav')

    <div class="col-md-12 col-sm-12 faq-top">
        <div class="const-txt">
            {!! htmlspecialchars_decode($page->text->description->$cur_lang)!!}
            <div class="next-block create">
                <a data-toggle="modal" data-target="#myModal" class="next create">@lang('app.create_question')</a>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 faq-accordion">
        <div class="panel-group" id="faq-accordion">
            @foreach( $page->title->faq_questions->sortBy('sort') as $key => $question )
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq-accordion" href="#faq-collapse{{$key}}">
                                <img class="act-quest-r" src="{{asset('img/active-quest.png')}}" /> {!! substr(json_decode($question->question)->$cur_lang,3,-4) !!}
                            </a>
                        </h4>
                    </div>
                    <div  id="faq-collapse{{$key}}" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="wr-answer">
                                <div class="faq-authors owl-carousel">
                                    <div class="owl-item" style="width: 176px;">
                                        <div class="block-carousel">
                                            <img class="img focus-img" src="{{asset('/uploads/avatar/'.$question->user->avatar->where('category_id', 3)->first()->image)}}">
                                            <div class="name-auth-carousel">{!! explode(' ', \App\User::getFullName($question->user->id))[0] !!}<br>{!! explode(' ', \App\User::getFullName($question->user->id))[1] !!}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="answ-but">
                                    <a href="#" data-toggle="modal" data-target="#myModal2">
                                        <span>@lang('app.write')</span> <br />@lang('app.your')<br />
                                        @lang('app.answer')
                                    </a>
                                </div>
                            </div>
                            <div class="purpose-top">
                                <div class="left-bl col-md-6 ">
                                    <div class="author-block">@lang('app.by') <span>{{\App\User::getFullName($question->user->id)}}</span></div>
                                    <span class="date"><img src="{{ asset( 'uploads/info_page_icon_svg/calendar.svg' )}}"> {{  $question->faq_answers->first()->created_at }}</span>
                                    <span class="views"><img src="{{ asset( 'uploads/info_page_icon_svg/view.svg' ) }}"> {{  $question->faq_answers->first()->views ?? random_int(300, 12000)}}</span>
                                </div>
                                <div class="right-bl col-md-6">
                                    @if( $page->language->slug !== $cur_lang )
                                        @lang('app.tran_from_russian') @lang('app.view')
                                        <a href="{{ asset('/'.$page->language->slug.'/information/'.$slug )}}">
                                            @lang('app.original')
                                        </a>
                                    @endif
                                    <div class="fl-right">
                                        <span class="pdf-but"><a href=""><img src="{{asset( 'uploads/info_page_icon_svg/pdf.svg' ) }}"> @lang('app.pdf')</a></span>
                                        <span class="print-but"><a href=""><img src="{{ asset( 'uploads/info_page_icon_svg/print.svg' )}}"> @lang('app.print')</a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <table class="full-equal purpose">
                                    <tbody>
                                    <tr>
                                        <td class="equal-blocks">
                                            @php($answer_left_part = $page->splitAnswerMiddle(json_decode($question->faq_answers->first()->answer)->$cur_lang, 'left'))
                                            @php($answer_right_part = $page->splitAnswerMiddle(json_decode($question->faq_answers->first()->answer)->$cur_lang, 'right'))
                                            <div>{!! $page->splitAnswerMiddle(json_decode($question->faq_answers->first()->answer)->$cur_lang, 'left' ) !!}</div>
                                            @if(strlen( $answer_left_part ) > 2000)
                                                <div class="next-block">
                                                    <a href="#" onclick="scroll_to('next-answer-block-{{$key}}')" class="next">@lang('app.next')</a>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="equal-blocks" id="next-answer-block-{{$key}}">
                                            <div>{!! htmlspecialchars_decode( $answer_right_part ) !!}</div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('Information.partials.shared')
    {{--@include( 'Information.modals.create_question' )--}}
    {{--@include( 'Information.modals.create_answer' )--}}
@endsection

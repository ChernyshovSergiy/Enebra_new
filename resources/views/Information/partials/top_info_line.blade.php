<div class="col-md-12 col-sm-12">
    <div class="purpose-top">
        <div class="left-bl col-md-6 ">
            <div class="author-block">@lang('app.by')
                <span>@lang('app.sergey')</span>
            </div>
            <span class="date">
                <img src="{{ asset( 'uploads/info_page_icon_svg/calendar.svg' )}}">
                {{ $page->created_at }}
            </span>
            <span class="views">
                <img src="{{ asset( 'uploads/info_page_icon_svg/view.svg' ) }}">
                4479
                {{--{{$page->summ_views( $page -> slug )}}--}}
            </span>
        </div>
        <div class="right-bl col-md-6">
            @if( $page->language->slug !== $cur_lang )
                @lang('app.tran_from_russian') @lang('app.view')
                <a href="{{ asset('/'.$page->language->slug.'/information/'.$slug )}}">
                    @lang('app.original')
                </a>
            @endif
            <div class="fl-right">
                <span class="pdf-but">
                    <a href="{{ asset('/information/'.$page->slug.'/pdf')}}">
                        <img src="{{asset( 'uploads/info_page_icon_svg/pdf.svg' ) }}">
                        @lang('app.pdf')
                    </a>
                </span>
                <span class="print-but">
                    <a href="#" onclick="print()">
                        <img src="{{ asset( 'uploads/info_page_icon_svg/print.svg' )}}">
                        @lang('app.print')
                    </a>
                </span>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
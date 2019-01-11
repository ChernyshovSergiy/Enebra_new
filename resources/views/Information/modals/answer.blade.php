<div id="myModal3" class="modal fade que-answ terms" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{!!  $terms->content->title->$cur_lang  !!}</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12 col-sm-12">
                    <div class="purpose-top">
                        <div class="left-bl col-md-6 col-sm-12">
                            <div class="author-block">@lang('app.by') <span>@lang('app.sergey')</span></div>
                            <span class="date"><img src="{{asset( 'uploads/info_page_icon_svg/calendar.svg' )}}">{{$terms->created_at}}</span>
                            <span class="views"><img src="{{asset( 'uploads/info_page_icon_svg/view.svg')}}"> {{$terms->views_count}}</span>
                        </div>
                        <div class="right-bl col-md-6 col-sm-12">
                            <div class="fl-right">
                                <span class="pdf-but"><a href=""><img src="{{asset( 'uploads/info_page_icon_svg/pdf.svg')}}"> @lang('app.pdf')</a></span>
                                <span class="print-but"><a href="#" onclick="print()" ><img src="{{asset( 'uploads/info_page_icon_svg/print.svg' )}}"> @lang('app.print')</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="full-equal">
                    <tbody>
                        <tr>
                            <td class="equal-blocks">
                                {!! htmlspecialchars_decode ( $terms->content->left_textarea->$cur_lang ) !!}
                                <div class="next-block"><a class="next" href="#" onclick="scroll_to_top()">@lang('app.next')</a></div>
                            </td>
                            <td class="equal-blocks">
                                {!! htmlspecialchars_decode ( $terms->content->right_textarea->$cur_lang ) !!}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="col-md-12 col-sm-12">
                    <div class="purpose-txt">{!! htmlspecialchars_decode ( $terms->content->down_textarea->$cur_lang ) !!}</div>
                </div>
                <button type="button" class="button span-med" data-dismiss="modal">@lang('app.close')</button>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!-- Modal QUESTION ANSWER -->
<div id="myModal" class="modal fade que-answ" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><img src="{{ asset('img/close-modal.png') }}"/></button>
                <h4 class="modal-title">@lang('modals.create_question')</h4>
            </div>
            <div class="modal-body">
                <form method="" action="">
                    <input type="text" class="form-control"  placeholder="@lang('modals.enter_question')"/>
                    <textarea
                            class="faqtextarea" name="faqtextarea"  placeholder="@lang('modals.enter_answer')">
                    </textarea>
                    <script type="text/javascript">
                        function preview(){
                            tinyMCE.activeEditor.execCommand('mcePreview');
                        }
                    </script>
                    <div onclick="preview()" class="button preview">@lang('modals.preview')</div>
            </div>
            <div class="modal-footer top">
                <div class="prev-block">
                    <a href="#" class="prev-vers"></a><span>@lang('modals.versions_preview')</span><a href="#" class="next-vers"></a>
                </div>
                <div class="form-group lang-sel">
                    <label class="control-label">@lang('app.language')</label>
                    <select class="form-control">
                        @foreach( $languages as $language )
                            <option value="{{$language->slug}}">{{$language->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="button create-vers">@lang('modals.create_version')</div>
            </div>
            <div class="modal-footer bottom">
                <div class="next-button">
                    <input type="checkbox" name="checkboxG5" id="checkboxG5" class="css-checkbox" checked="checked"/>
                    <label for="checkboxG5" class="css-label">@lang('modals.button_more')</label>
                </div>
                <button class="button publish">@lang('modals.versions_preview')</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal  QUESTION ANSWER-->
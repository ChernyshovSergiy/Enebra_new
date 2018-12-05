<footer>
    <div class="container-fluid">
        <div class="col-md-8 no-pad">
            <div class="logo-copy col-md-2 col-sm-2 no-pad">
                <a href="{{asset('')}}">
                    <img class="logo img-responsive" src="{{ asset( 'img/logo-f.png')}}"/>
                </a>@lang('app.copy')
                <div class="foot-auth"><img class="img-responsive" src="{{ asset( 'img/f-a.png')}}"/><span>@lang('app.sergey_gerasimov')</span>
                    @lang('app.web_development')</div>
                <div class="find-us hidden-md hidden-lg">
                    <h3>@lang('app.find_on_us')</h3>
                    @foreach( $socials as $social)
                        @if($social && $social->is_active != 0)
                            <a href="{{$social->url->$cur_lang}}" target="_blank"><img src="{{ asset( $social->getImage() )}}"/>  {{$social->name }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="logo-txt col-md-10 col-sm-10">
               <span class="mobile-logo hidden-1920 show-820">
                   <a href="{{asset('')}}">
                        <img class="logo img-responsive" src="{{ asset( 'img/logo-f.png')}}"/>
                   </a>@lang('app.copy')</span>
                <p class="mobile-p">
                    <span class="text-uppercase">@lang('app.enebra')</span>
                    @lang('app.the_social_project')
                    <br />
                    <span style="padding-left:60px;"> </span>@lang('app.network_for')
                </p>
                <div class="clearfix"></div>
                <div class="find-us col-md-3 hidden-sm hidden-xs">
                    <h3>@lang('app.find_on_us')</h3>
                    @foreach( $socials as $social)
                        @if($social && $social->is_active != 0)
                            <a href="{{$social->url->$cur_lang}}" target="_blank"><img src="{{ asset( $social->getImage() )}}"/>  {{ $social->name }}</a>
                        @endif
                    @endforeach
                </div>
                <!--MOBILE FORM-->
                <div class="col-sm-10 footer-contactus col-lg-push-0 col-md-push-0 hidden-md hidden-lg col-sm-push-2">
                    <h3>@lang('app.contact_us')</h3>
                    <form method="" action="">
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-3 form-control-label">@lang('app.name')</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputName"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-3 form-control-label">@lang('app.email')</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="inputEmail"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputmess" class="col-sm-3 form-control-label">@lang('app.message')</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="inputmess" rows="5"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default hvr-radial-out">@lang('app.send')</button>
                    </form>
                </div>
                <!--MOBILE FORM-->
                <div class="subscribe col-lg-push-0 col-md-push-0 col-md-8 col-sm-10 col-sm-push-2">
                    <p>@lang('app.to_learn')</p>

                    {{--<form method="post" action="">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--<div class="input-group">--}}
                            {{--<input type="text" name="sub-email" class="sub-email form-control" placeholder="@lang('app.your_address')"/>--}}
                            {{--<span class="input-group-btn  hvr-radial-out">--}}
                                {{--<button class="btn btn-secondary" onclick="subscribe()" type="button">@lang('app.subscribe')</button>--}}
                            {{--</span>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                    {{ Form::open(['route'=>'subscribe', 'method'=>'post']) }}
                        <div class="input-group">
                            <input type="text" name="email" class="sub-email form-control" placeholder="@lang('app.your_address')"/>
                            <span class="input-group-btn  hvr-radial-out">
                                <button class="btn btn-secondary" type="submit" data-toggle="modal" data-target="#ModalCenter">@lang('app.subscribe')</button>
                              </span>
                        </div>
                <!-- .modal-content -->
                    <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalLongTitle">@lang('app.subscribe')</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    {{ session('status') }} @include('admin.error')
                                </div>
                                <div class="modal-footer">
                                    {{--<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>--}}
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" >Ok</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    {{ Form::close() }}
                    <a href="mailto:"><img src="{{ asset( 'uploads/footer_icon/mail.svg') }}"/> info@enebra.org</a>
                    <a data-toggle="modal" data-target="#myModal3" onclick="increment_term()" href="#">
                        <img src="{{asset( 'uploads/footer_icon/terms.svg')}}"/>@lang('app.terms')
                    </a>
                    <p class="rights-txt hidden-sm hidden-xs">@lang('app.use_materials')
                        <br/>
                        @lang('app.all_right')
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4 footer-contactus hidden-sm hidden-xs">
            <h3>@lang('app.contact_us')</h3>
            <form method="" action="">
                <div class="form-group row">
                    <label for="input_name" class="col-sm-2 form-control-label">@lang('app.name')</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control contact-form-element" id="input_name" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input_email" class="col-sm-2 form-control-label">@lang('app.email')</label>
                    <div class="col-sm-10">
                        <input type="email"  class="form-control contact-form-element" id="input_email" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input_message" class="col-sm-2 form-control-label">@lang('app.message')</label>
                    <div class="col-sm-10">
                        <textarea class="form-control contact-form-element" id="input_message" rows="5"></textarea>
                    </div>
                </div>
                <button type="button" onclick="contacts()" class="btn btn-default hvr-radial-out">@lang('app.send')</button>
            </form>
        </div>
        <div class="clearfix"></div>
        <!--MOBILE authors-->
        <div class="col-xs-12 hidden-1920 show-820">
            <div class="find-us col-xs-3">
                <h3>@lang('app.find_on_us')</h3>
                @foreach( $socials as $social)
                    @if($social && $social->is_active != 0)
                        <a href="{{$social->url->$cur_lang}}" target="_blank">
                        <img src="{{ asset( $social->getImage() )}}"/>
                        {{$social -> name}}</a>
                    @endif
                @endforeach
            </div>
            <div class="col-xs-4 auth-block-f">
                <div class="foot-auth">
                    <img class="img-responsive" src="{{ asset('img/af2.png') }}"/>
                    <span>@lang('app.sergey')</span>@lang('app.author')
                </div>
            </div>
            <div class="col-xs-4 auth-block-f">
                <div class="foot-auth">
                    <img class="img-responsive" src="{{ asset('img/a1f.png') }}"/>
                    <span>@lang('app.sergey_gerasimov')</span>@lang('app.web_development')
                </div>
            </div>
        </div>
        <!--MOBILE authors-->
        <p class="rights-txt hidden-md hidden-lg">@lang('app.use_materials') <span class="p-next-line">@lang('app.all_right')</span>
        </p>
    </div>
</footer>

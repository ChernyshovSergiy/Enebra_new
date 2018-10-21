<div class="sign-reg register">

    <div class="close-form"><span class="glyphicon glyphicon-remove"></span></div>

    <form method="post" action="">

        <h3>@lang('app.signup')</h3>
        <h3> </h3>

        <div class="adaptive">

            {{--<div class="form-group col-xs-12">--}}

                {{--<select class="form-control reg-field"  id="nationality" name="nationality">--}}

                    {{--<option value="0">@lang('signup.select_nationality')</option>--}}

                    {{--@include( 'Information.partials.countries')--}}

                {{--</select>--}}

            {{--</div>--}}

            {{--<div class="form-group col-xs-12">--}}

                {{--<div class="text-center">--}}
                    {{--<img src="{{asset('img/uploadphoto.png')}}" id="preview" onclick="auth.trigger_avatar()" />--}}
                    {{--<input type="file" class="hidden" accept="image/*"  name="upload" id="file" onchange="auth.avatar()" />--}}

                {{--</div>--}}

            {{--</div>--}}

            {{--<div class="form-group col-md-6 col-xs-12">--}}

                {{--<input type="text" class="form-control reg-field" id="firstname" name="firstname" placeholder="@lang('signup.firstname')"/>--}}

            {{--</div>--}}

            {{--<div class="form-group col-md-6 col-xs-12">--}}

                {{--<input type="text" class="form-control reg-field" id="lastname"  name="lastname" placeholder="@lang('signup.lastname')"/>--}}

            {{--</div>--}}

            {{--@if( $locale -> id != 1 )--}}
                {{--<div class="form-group col-md-6 col-xs-12">--}}

                    {{--<input type="text" class="form-control reg-field" id="firstname_en" name="firstname_en" placeholder="@lang('signup.firstname_en')"/>--}}

                {{--</div>--}}

                {{--<div class="form-group col-md-6 col-xs-12">--}}

                    {{--<input type="text" class="form-control reg-field" id="lastname_en"  name="lastname_en" placeholder="@lang('signup.lastname_en')"/>--}}

                {{--</div>--}}
            {{--@endif--}}

            {{--<div class="form-group col-xs-12 select-group">--}}

                {{--<div class="col-md-4 col-sm-4 col-xs-4 no-pad pad-right">--}}

                    {{--<select class="form-control reg-field" id="sex" name="sex">--}}
                        {{--@for( $i = 0; $i < 3; $i++)--}}
                            {{--<option value="{{$i}}">@lang('app.sex.' . $i)</option>--}}
                        {{--@endfor--}}
                    {{--</select>--}}

                {{--</div>--}}
                {{--<div class="col-md-8 col-sm-8 col-xs-8 no-pad">--}}
                    {{--<select class="form-control reg-field" id="country" name="country">--}}

                        {{--<option value="0">@lang('signup.birth')</option>--}}

                        {{--@include( 'Information.partials.countries')--}}

                    {{--</select>--}}

                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="form-group col-xs-12 select-group">--}}
                {{--<div class="col-md-3 col-sm-3 col-xs-3 no-pad  pad-right">--}}
                    {{--<select class="form-control reg-field"  id="birthday" name="birthday">--}}
                        {{--<option value="0">@lang('signup.day')</option>--}}

                        {{--@include('Information.partials.days')--}}

                    {{--</select>--}}
                {{--</div>--}}
                {{--<div class="col-md-5 col-sm-5 col-xs-5 no-pad pad-right">--}}
                    {{--<select onchange="create_date('birth')" class="form-control reg-field" id="birthmonth" name="birthmonth">--}}
                        {{--<option value="0">@lang('signup.month')</option>--}}

                        {{--@include( 'Information.partials.months')--}}

                    {{--</select>--}}
                {{--</div>--}}
                {{--<div class="col-md-4 col-sm-4 col-xs-4 no-pad">--}}
                    {{--<select onchange="create_date('birth')"  class="form-control reg-field" id="birthyear" name="birthyear">--}}

                        {{--<option value="0">@lang('signup.year')</option>--}}

                        {{--@include( 'Information.partials.years')--}}

                    {{--</select>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="adaptive">--}}

            {{--<div class="marg-bot">--}}

                {{--<div class="form-group col-xs-12">--}}

                    {{--<select class="form-control reg-field" id="document_id" name="document_id">--}}

                        {{--<option value="0">@lang('signup.document')</option>--}}
                        {{--@foreach(\App\Models\Document::get_ids() as $doc)--}}

                            {{--<option value="{{$doc -> id}}">{{Lang::get('documents.' . $doc -> id )}}</option>--}}

                        {{--@endforeach--}}
                    {{--</select>--}}
                {{--</div>--}}
                {{--<div class="form-group col-xs-12">--}}

                    {{--<input type="text" class="form-control reg-field" id="document" name="document" placeholder="@lang('signup.document_number')"/>--}}

                {{--</div>--}}

                {{--<div class="form-group col-xs-12 select-group">--}}

                    {{--<div class="col-md-3 col-sm-3 col-xs-3 no-pad  pad-right">--}}

                        {{--<select class="form-control reg-field" id="dateday" name="dateday" >--}}
                            {{--<option value="0">@lang('signup.day')</option>--}}

                            {{--@include( 'Information.partials.days')--}}

                        {{--</select>--}}

                    {{--</div>--}}

                    {{--<div class="col-md-5 col-sm-5 col-xs-5 no-pad pad-right">--}}

                        {{--<select onchange="create_date('date')"  class="form-control reg-field" id="datemonth" name="datemonth" >--}}
                            {{--<option value="0">@lang('signup.month')</option>--}}

                            {{--@include('Information.partials.months')--}}

                        {{--</select>--}}

                    {{--</div>--}}
                    {{--<div class="col-md-4 col-sm-4 col-xs-4 no-pad">--}}
                        {{--<select onchange="create_date('date')"  class="form-control reg-field" id="dateyear" name="dateyear">--}}
                            {{--<option value="0">@lang('signup.year')</option>--}}

                            {{--@include('Information.partials.years')--}}

                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="marg-bot">
                <div class="form-group col-xs-12 no-pad">
                    <label for="input_referral_number" class="col-sm-1 form-control-label glyphicon glyphicon-certificate"></label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" id="input_referral_number" name="referral_number" placeholder="@lang('signup.referral_number')"/>
                    </div>
                </div>
                <div class="form-group col-xs-12 no-pad">
                    <label for="input_first_name" class="col-sm-1 form-control-label glyphicon glyphicon-user"></label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" id="input_first_name" name="first_name" placeholder="@lang('signup.first_name')"/>
                    </div>
                </div>
                <div class="form-group col-xs-12 no-pad">
                    <label for="input_last_name" class="col-sm-1 form-control-label glyphicon glyphicon-user"></label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" id="input_last_name" name="last_name" placeholder="@lang('signup.last_name')"/>
                    </div>
                </div>
                {{--<div class="form-group col-xs-12 no-pad">--}}
                    {{--<label for="login" class="col-sm-1 form-control-label glyphicon glyphicon-user"></label>--}}
                    {{--<div class="col-sm-11">--}}
                        {{--<input type="text" class="form-control" id="login" name="login" placeholder="@lang('signup.login')"/>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="form-group col-xs-12 no-pad"><h1></h1></div>
                <div class="form-group col-xs-12 no-pad">
                    <label for="input_email" class="col-sm-1 form-control-label glyphicon glyphicon-envelope"></label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" id="input_email" name="email" placeholder="@lang('signup.email')"/>
                    </div>
                </div>
                {{--<div class="form-group col-xs-12">--}}

                    {{--<input type="text" class="form-control reg-field" id="email" name="email" placeholder="@lang('signup.email')"/>--}}

                {{--</div>--}}
            </div>



            {{--<div class="form-group col-xs-12">--}}

                {{--<input type="text" class="form-control reg-field" id="login" name="login" placeholder="@lang('signup.login')"/>--}}

            {{--</div>--}}
            <div class="form-group col-xs-12 no-pad">
                <label for="password" class="col-sm-1 form-control-label glyphicon glyphicon-lock"></label>
                <div class="col-sm-11">
                    <input type="password" class="form-control" id="password" name="password" placeholder="@lang('signup.password')"/>
                </div>
            </div>
            <div class="form-group col-xs-12 no-pad">
                <label for="confirm_password" class="col-sm-1 form-control-label glyphicon glyphicon-log-in"></label>
                <div class="col-sm-11">
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="@lang('signup.confirm_password')"/>
                </div>
            </div>

            {{--<div class="form-group col-xs-12">--}}
                {{--<input type="password" class="form-control reg-field" id="password" name="password" placeholder="@lang('signup.password')"/>--}}
            {{--</div>--}}
            {{--<div class="form-group col-xs-12">--}}
                {{--<input type="password" class="form-control reg-field" id="password_confirm" name="confirm" placeholder="@lang('signup.confirm_password')"/>--}}
            {{--</div>--}}

            <div class="clearfix"></div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="checkboxG1" id="checkboxG1" checked="checked" class="css-checkbox" />

                    <label for="checkboxG1" class="css-label radGroup1">@lang('signup.i_accept')

                        <a data-toggle="modal" data-target="#myModal3" href="#" onclick="scroll_to_top()" >@lang('app.terms')</a></label>
                </label>
            </div>
            <button type="button" onclick="auth.signup( 'reg-field' )" class="btn btn-default hvr-radial-out right-but">@lang('app.signup')</button>
        </div>
    </form>
</div>

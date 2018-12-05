<div class="sign-reg register">

    <div class="close-form"><span class="glyphicon glyphicon-remove"></span></div>

    <form method="post" action=""> {{csrf_field()}}

        <h3>@lang('app.signup')</h3>
        @include('admin.error')
        <br/>

        <div class="adaptive">
            <div class="marg-bot">
                <div class="form-group col-xs-12 no-pad">
                    <label for="input_referral_number" class="col-sm-1 form-control-label glyphicon glyphicon-certificate"></label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" id="input_referral_number" name="referral_number" placeholder="@lang('signup.referral_number')" value="{{old('referral_number')}}"/>
                    </div>
                </div>
                <div class="form-group col-xs-12 no-pad">
                    <label for="input_first_name" class="col-sm-1 form-control-label glyphicon glyphicon-user"></label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" id="input_first_name" name="first_name" placeholder="@lang('signup.first_name')" value="{{old('first_name')}}"/>
                    </div>
                </div>
                <div class="form-group col-xs-12 no-pad">
                    <label for="input_last_name" class="col-sm-1 form-control-label glyphicon glyphicon-user"></label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" id="input_last_name" name="last_name" placeholder="@lang('signup.last_name')" value="{{old('last_name')}}"/>
                    </div>
                </div>
                <div class="form-group col-xs-12 no-pad"><dr/></div>
                <div class="form-group col-xs-12 no-pad">
                    <label for="input_email" class="col-sm-1 form-control-label glyphicon glyphicon-envelope"></label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" id="input_email" name="email" placeholder="@lang('signup.email')" value="{{old('email')}}"/>
                    </div>
                </div>
            </div>

            <div class="form-group col-xs-12 no-pad">
                <label for="password" class="col-sm-1 form-control-label glyphicon glyphicon-lock"></label>
                <div class="col-sm-11">
                    <input type="password" class="form-control" id="password" name="password" placeholder="@lang('signup.password')"/>
                </div>
            </div>
            <div class="form-group col-xs-12 no-pad">
                <label for="password_confirmation" class="col-sm-1 form-control-label glyphicon glyphicon-log-in"></label>
                <div class="col-sm-11">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="@lang('signup.confirm_password')"/>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="checkboxG1" id="checkboxG1" checked="checked" class="css-checkbox" />

                    <label for="checkboxG1" class="css-label radGroup1">@lang('signup.i_accept')

                        <a data-toggle="modal" data-target="#myModal3" href="#" onclick="scroll_to_top()" >@lang('app.terms')</a></label>
                </label>
            </div>
            {{--<button type="button" onclick="auth.signup( 'reg-field' )" class="btn btn-default hvr-radial-out right-but">@lang('app.signup')</button>--}}
            <button type="submit" class="btn btn-default hvr-radial-out right-but regbutton">@lang('app.signup')</button>
        </div>
    </form>
</div>

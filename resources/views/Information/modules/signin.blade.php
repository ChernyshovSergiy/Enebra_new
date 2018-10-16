<div class="sign-reg signin">

    <div class="close-form"><span class="glyphicon glyphicon-remove"></span></div>

    <form method="post" action="">

        <h3>@lang('auth.auth')</h3>

        <div class="form-group col-xs-12 no-pad">

            <label for="inputlogin" class="col-sm-3 form-control-label">@lang('auth.login')</label>

            <div class="col-sm-9">

                <input type="text" class="form-control signin-field" id="login" name="login" />

            </div>

        </div>

        <div class="form-group col-xs-12 no-pad">

            <label for="inputpass" class="col-sm-3 form-control-label ">@lang('auth.password')</label>

            <div class="col-sm-9">

                <input type="password" class="form-control signin-field" id="password" name="password" />

            </div>

        </div>

        <button type="button" onclick="auth.signin( 'signin-field' )" class="btn btn-default hvr-radial-out right-but">@lang('auth.signin')</button>

        <div class="clearfix"></div>

        <h3 class="forg">@lang('auth.forgot')</h3>

        <div class="form-group col-xs-12 no-pad">

            <label for="inputemail" class="col-sm-3 form-control-label">@lang('auth.email')</label>

            <div class="col-sm-9">

                <input type="text" class="form-control" id="inputemail"/>

            </div>

        </div>

        <div class="form-group col-xs-12 no-pad">

            <label for="inputphone" class="col-sm-3 form-control-label">@lang('auth.phone')</label>

            <div class="col-sm-9">

                <input type="text" class="form-control" id="inputphone"/>

            </div>

        </div>

        <button type="submit" class="btn btn-default hvr-radial-out right-but">@lang('app.send')</button>

        <div class="clearfix"></div>

        <div class="regb">

            <div class="btn btn-default hvr-radial-out">@lang('app.signup')</div>

        </div>

    </form>

</div>
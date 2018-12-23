<div class="col-md-12 col-sm-12">
    <div class="purpose-bottom">
        <div class="bot-left">
            <span class="title">@lang('app.share')</span>
            <div class="shares">
                {{--@php($image='img/bg.png')--}}
                <ul>
                    <li><a href="#" class="email"><img src="{{asset( 'uploads/share_icon_svg/email.svg' )}}"> Email</a></li>
                    <li><a href="#" class="fac"><img src="{{asset( 'uploads/share_icon_svg/facebook-1.svg' )}}"> Facebook</a></li>
                    <li><a href="#" class="tw"><img src="{{asset( 'uploads/share_icon_svg/tweet.svg' )}}"> Tweet</a></li>
                    <li><a href="#" class="pinter"><img src="{{asset( 'uploads/share_icon_svg/pin.svg' )}}"> Pin</a></li>
                    <li><a href="#" class="link"><img src="{{asset( 'uploads/share_icon_svg/linkedin.svg' )}}"> Linkedin</a></li>
                    <li><a href="#" class="gpl"><img src="{{asset( 'uploads/share_icon_svg/google.svg' )}}"> Google+</a></li>
                    <li><a href="#" class="tumblr"><img src="{{asset( 'uploads/share_icon_svg/tumblr.svg' )}}"> Tumblr</a></li>
                    <li><a href="#" class="vkon"><img src="{{asset( 'uploads/share_icon_svg/vk-1.svg' )}}"> VK</a></li>
                    <li><a href="#" class="reddit"><img src="{{asset( 'uploads/share_icon_svg/reddit.svg' )}}"> Reddit</a></li>
                    {{--<li class="li-align"><a href="#" class="vkon"><img src="{{asset( 'uploads/share_icon_svg/vk-1.svg' )}}"> VK</a></li>--}}
                    {{--<li class="li-alignn"><a href="#" class="reddit"><img src="{{asset( 'uploads/share_icon_svg/reddit.svg' )}}"> Reddit</a></li>--}}

                </ul>
            </div>

        </div>
        <div class="bot-right">
            <span class="title" >@lang('app.tools')</span>
            <div class="tools">
                @lang('app.permalink')
                <input type="text" id="post-shortlink"  class="permalink" placeholder={{ url()->current() }}>
            </div>
        </div>
    </div>
</div>
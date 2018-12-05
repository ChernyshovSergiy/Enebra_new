@component('mail::message')
# {{ Lang::get('mail.email_confirmation') }}

###{{ Lang::get('mail.subscribe')  }}
##{{ Lang::get('mail.click_to_link')  }}
@component('mail::button', ['url' => route('subscribe.verify', ['token' => $subs->token])])
    {{ Lang::get('mail.verify_email')  }}
@endcomponent

{{ Lang::get('mail.thanks')  }},<br>
{{ Lang::get('mail.enebra') }}
@endcomponent
<meta charset="utf-8"/>

<meta http-equiv="X-UA-Compatible" content="IE=edge"/>

<meta name="viewport" content="width=device-width, initial-scale=1"/>

<meta name="yandex-verification" content="c2dd8848ce2c3ea5" />
<meta name="description" content="{!! isset($meta_desc) ?substr($meta_desc,3,-4): '' !!}"/>
<meta name="keywords" content="{{ isset($keywords) ? $keywords : '' }}"/>
<meta name="csrf-token" content="{{ csrf_token() }}"/>

<title>@lang('index.enebra')</title>

<link href="{{ asset( 'css/frontend.css' ) }}" rel="stylesheet"/>

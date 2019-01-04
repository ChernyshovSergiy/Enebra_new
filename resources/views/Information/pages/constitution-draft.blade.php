@extends('layouts.information')
@section('content')
    @include( 'Information.common.nav')
    @include( 'Information.partials.top_info_line' )

    <div class="col-md-12 col-sm-12">
        <div class="const-txt">
            <div class="h2">{!! substr(str_replace("<br />\r", "", explode(PHP_EOL, $page->text->sub_title->$cur_lang)[0]),3) !!}
                <span>{!!  substr(str_replace("<br />\r", "", explode(PHP_EOL, $page->text->sub_title->$cur_lang)[1]),0,-4) !!}</span>
            </div>
            &emsp;{!! htmlspecialchars_decode($page->text->top_textarea->$cur_lang)!!}
        </div>
    </div>
    <table class="full-equal constitution">
        <tbody>
        @foreach( $page->title->const_sections()->get()->sortBy('sort') as $key => $section )
            <tr>
                <td class=" equal-blocks">
                    <div class="h3">@lang('app.section') {{ ( $key + 1 )}}<span>{!! json_decode($section->title)->$cur_lang !!}</span></div>
                    <ul>
                        @foreach( $section->const_articles()->where('side', '=', 0)->get()->sortBy('sort') as $article )
                            <li>
                                <span>@lang('app.article') {{ $article->sort }}:</span>&emsp;{!! json_decode($article->article)->$cur_lang !!}
                            </li>
                        @endforeach
                    </ul>
                </td>
                <td class=" equal-blocks">
                    <ul>
                        @foreach( $section->const_articles()->where('side', '=', 1)->get()->sortBy('sort') as $article )
                            <li>
                                <span>@lang('app.article') {{ $article->sort }}:</span>&emsp;{!! json_decode($article->article)->$cur_lang !!}
                            </li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @include('Information.partials.description')
    @include('Information.partials.shared')
@endsection

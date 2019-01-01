@php($content = json_decode($block->content))

@if(!empty($content->title))
    <div class="h3">{!! $content->title->$cur_lang !!}</div>
@endif
@if(!empty($content->sub_title))
    <div class="span-med cent">{!! $content->sub_title->$cur_lang !!}</div>
@endif
@if(!empty($content->italic_text))
    <div>
        <span class="span-medit">{!! $content->italic_text->$cur_lang!!}</span>
    </div>
@endif
@if(!empty($content->regular_text))
    @if($block->desc_block_id === 5 && $block->sort === 3)
        <div class="formla-wrap">
            {!! explode(PHP_EOL, $content->regular_text->$cur_lang)[0] !!}
            <ul>
                <li><div class="li-span span-formula"><em>n</em></div>&mdash; {!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->regular_text->$cur_lang)[1]) !!}<a class="span-formula" style="color: #1e2425">;</a></li>
                <li><div class="li-span span-formula"><em>E<sup>(i)</sup>(t<sub>n</sub>)</em></div>&mdash;<a class="span-formula" style="color: #1e2425">&nbsp;<em> i</sub>&nbsp;</em></a> {!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->regular_text->$cur_lang)[2]) !!}<a class="span-formula" style="color: #1e2425">&nbsp;<em>t<sub>n</sub>&nbsp;</em>;</a></li>
                <li><div class="li-span span-formula"><em>B<sub>e</sub>(t<sub>n</sub>)</em></div>&mdash; {!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->regular_text->$cur_lang)[3]) !!}<a class="span-formula" style="color: #1e2425">&nbsp;<em>t<sub>n</sub>&nbsp;</em>;</a></li>
                <li><div class="li-span span-formula"><em>B(t<sub>n</sub>)</em></div>&mdash; {!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->regular_text->$cur_lang)[4]) !!}<a class="span-formula" style="color: #1e2425">&nbsp;<em>t<sub>n</sub>&nbsp;</em>;</a></li>
                <li><div class="li-span span-formula"><em>Z<sup>(i)</sup>(t<sub>n-1</sub>)</em></div>&mdash; {!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->regular_text->$cur_lang)[5]) !!}<a class="span-formula" style="color: #1e2425">&nbsp;<em>t<sub>n-1</sub>&nbsp;</em>;</a></li>
                <li><div class="li-span span-formula"><em>Z<sub>1</sub><sup>(i)</sup>(t<sub>n</sub>)</em></div>&mdash; {!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->regular_text->$cur_lang)[6]) !!}<a class="span-formula" style="color: #1e2425">&nbsp;<em>[t<sub>n-1</sub>; t<sub>n</sub>]&nbsp;</em>;</a></li>
                <li><div class="li-span span-formula"><em>Z<sub>2</sub><sup>(i)</sup>(t<sub>n</sub>)</em></div>&mdash; {!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->regular_text->$cur_lang)[7]) !!}<a class="span-formula" style="color: #1e2425">&nbsp;<em>[t<sub>n-1</sub>; t<sub>n</sub>]&nbsp;</em>;</a></li>
                <li><div class="li-span span-formula"><em>L</em></div>&mdash; {!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->regular_text->$cur_lang)[8]) !!}<a class="span-formula" style="color: #1e2425">&nbsp;<em>L=67*365*24*60&nbsp;</em>;</a></li>
                <li><div class="li-span span-formula"><em>T</em></div>&mdash; {!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->regular_text->$cur_lang)[9]) !!}<a class="span-formula" style="color: #1e2425">&nbsp;<em>= 10&nbsp;</em></a>{!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->regular_text->$cur_lang)[10]) !!}<a class="span-formula" style="color: #1e2425">;</a></li>
                <li><div class="li-span span-formula"><em>L/T</em></div>&mdash; {!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->regular_text->$cur_lang)[11]) !!}<a class="span-formula" style="color: #1e2425">;</a></li>
                <li><div class="li-span span-formula"><em>K(t<sub>n-1</sub>)</em></div>&mdash; {!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->regular_text->$cur_lang)[12]) !!}<a class="span-formula" style="color: #1e2425">&nbsp;<em>t<sub>n-1</sub>&nbsp;</em>;</a></li>
                <li><div class="li-span span-formula"><em>D(t<sub>n</sub>)</em></div>&mdash; {!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->regular_text->$cur_lang)[14]) !!}<a class="span-formula" style="color: #1e2425">&nbsp;<em>[t<sub>n-1</sub>; t<sub>n</sub>]&nbsp;</em>;</a></li>
           </ul>
            <div><a class="span-formula" style="color: #1e2425"><em>B(t<sub>n</sub>)</em> &mdash;<em>D(t<sub>n</sub>)</em></a>&nbsp;&nbsp;&mdash; {!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->regular_text->$cur_lang)[15]) !!}<a class="span-formula" style="color: #1e2425">&nbsp;<em>t<sub>n</sub>&nbsp;</em>;</a></div><br />
            <div><a class="span-formula" style="color: #1e2425"><em>K(t<sub>n</sub>)</em> = <em>K(t<sub>n-1</sub>)</em> + <em>(B(t<sub>n</sub>)</em> &mdash;<em>D(t<sub>n</sub>))</em></a>&nbsp;&nbsp;&mdash; {!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->regular_text->$cur_lang)[13]) !!}<a class="span-formula" style="color: #1e2425">&nbsp;<em>t<sub>n</sub>&nbsp;</em>;</a></div><br />
            <div><a class="span-formula" style="color: #1e2425"><em>E(t<sub>n</sub>)</em> = [<em>E<sup>(1)</sup>(t<sub>n</sub>); E<sup>(2)</sup>(t<sub>n</sub>); ...; E<sup>(k)</sup>(t<sub>n</sub>)</em>]</a>&nbsp;&nbsp;&mdash; {!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->regular_text->$cur_lang)[16]) !!}<a class="span-formula" style="color: #1e2425">&nbsp;<em>t<sub>n</sub>&nbsp;</em>; {!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->regular_text->$cur_lang)[17]) !!}</a><a class="span-formula" style="color: #1e2425">&nbsp;<em>k&nbsp;</em>&mdash;</a> {!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->regular_text->$cur_lang)[18]) !!}</div><br />
            <div><a class="span-formula" style="color: #1e2425"><em>E(t<sub>n</sub>)</em> = &Sigma;<em><sup>k</sup><sub>i=1</sub> E<sup>(i)</sup>(t<sub>n</sub>)</em></a>&nbsp;&nbsp;&mdash; {!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->regular_text->$cur_lang)[19]) !!}<a class="span-formula" style="color: #1e2425">&nbsp;<em>t<sub>n</sub>&nbsp;</em>;</a></div>
        </div>
    @else
        <div>{!! $content->regular_text->$cur_lang!!}</div>
    @endif
@endif
@if($block->getImageIn2() !== '/img/no-image.png')
    <div class="img-wrapper wallet">
        <div class="wallet-bl">
            <div class="top-txt">{!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[0]) !!} <span>1BA5pD pTEJGz 3w2wsP 2UbSwj nX5RWb sc9P</span></div>
            <div class="mid-txt">{!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[1]) !!} <span>5K2bE4 6ymf6P dzLFPL rxwQ3F BWYC9M qzqHtZ 3ZJ1DV AF8UV8 yq9</span></div>
            <div class="bot-txt"><span>{!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[2]) !!}</span></div>

            <img  src="{{$block->getImageIn1()}}"/>
        </div>
        <div class="wallet-bl">
            <div class="top-txt">{!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->image_text_2->$cur_lang)[0]) !!} <span>{!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->image_text_2->$cur_lang)[1]) !!}</span></div>
            <div class="mid-txt">{!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->image_text_2->$cur_lang)[2]) !!} <span>{!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->image_text_2->$cur_lang)[3]) !!}</span></div>
            <div class="bot-txt"><span>{!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->image_text_2->$cur_lang)[4]) !!}</span></div>
            <img  src="{{$block->getImageIn2()}}"/>
        </div>
    </div>
@elseif($block->getImageIn1() !== '/img/no-image.png')
    <div class="img-full">
        <div class="img-wrapper">
            <div class="desc-auth-block">
                <img src="{{$block->getImageIn1()}}"/>
                <span class="span-medit">{!! $content->image_text_1->$cur_lang !!}</span>
            </div>
            <img class="desc-img" src="{{$block->getBGImage()}}"/>
        </div>
    </div>
@elseif($block->getBGImage() !== '/img/no-image.png')
    @if($block->desc_block_id === 5 && $block->sort === 5)
        <div class="img-wrapper shema">
            <div class="shema-block">
                <div class="shema-item f">
                    <span class="left-bl minut">{!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[0]) !!}</span>
                </div>
                <div class="shema-item arr">
                    <img  src="{{$block->getBGImage()}}"/>
                </div>
                <div class="shema-item th">
                    <span class="left-bl">{!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[1]) !!}</span>
                    <span class="left-bl">{!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[2]) !!}</span>
                    <span class="left-bl">{!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[3]) !!}</span>
                </div>
            </div>
        </div>
    @elseif($block->desc_block_id === 6 && $block->sort === 1)
        <div class="img-full">
            <div class="img-wrapper">
                <span class="hum-be">{!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[0]) !!}</span>
                <span class="maintain"><span>{!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[1]) !!}</span>{!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[2]) !!}</span>
                <img class="desc-img h-being" src="{{$block->getBGImage()}}"/>
            </div>
        </div>
    @elseif($block->desc_block_id === 7 && $block->sort === 1)
        <div class="img-full">
            <div class="img-wrapper im9">
                <img class="mouse" src="{{$block->getBGImage()}}"/>
                {{--{{dd($content->image_text_1->$cur_lang)}}--}}
                <ul class="top-ul">
                    <li>{!!  substr(str_replace("<br />\r", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[0]),3) !!}</li>
                    <li>{!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[1]) !!}</li>
                    <li>{!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[2]) !!}</li>
                    <li>{!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[3]) !!}</li>
                    <li>{!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[4]) !!}</li>
                    <li>{!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[5]) !!}</li>
                </ul>
                <ul class="left-ul">
                    <li>{!!  str_replace("<br />\r\n", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[6]) !!}</li>
                    <li>{!!  str_replace("<br />\r\n", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[7]) !!}</li>
                    <li>{!!  str_replace("<br />\r\n", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[8]) !!}</li>
                    <li>{!!  str_replace("<br />\r\n", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[9]) !!}</li>
                    <li>{!!  str_replace("<br />\r\n", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[10]) !!}</li>
                    <li>{!!  str_replace("<br />\r\n", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[11]) !!}</li>
                    <li>{!!  str_replace("<br />\r\n", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[12]) !!}</li>
                    <li>{!!  str_replace("<br />\r\n", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[13]) !!}</li>
                    <li>{!!  str_replace("<br />\r\n", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[14]) !!}</li>
                </ul>
                <ul class="bot-ul">
                    <li>{!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[15]) !!}:  175, 477 125 732 </li>
                    <li>{!!  str_replace("<br />\r", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[16]) !!}:  777 340 457 267</li>
                    <li>{!!  substr(str_replace("<br />\r", "", explode(PHP_EOL, $content->image_text_1->$cur_lang)[17]),0,-4) !!}:  7 369 753 891</li>
                </ul>
            </div>
        </div>
    @elseif($block->desc_block_id === 9 && $block->sort === 1)
        <div class="img-full">
            <div class="img-wrapper">
                <img class="desc-img" src="{{$block->getBGImage()}}"/>
                <div class="lawmak">{!! substr($content->image_text_1->$cur_lang ,3,-4) !!}</div>
            </div>
        </div>
    @elseif($block->shadow === 1)
        <div class="img-full">
            <div class="img-wrapper">
                <img class="desc-img" src="{{$block->getBGImage()}}"/>
            </div>
        </div>
    @else
        <div class="img-full">
            <img class="not-shadow-img" src="{{$block->getBGImage()}}"/>
        </div>
    @endif
@endif


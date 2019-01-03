<div class="img-block pages">

    @include( 'Information.common.header' )

    <div class="f-blocks pages-title">
        <h1>{!! json_decode($menu->title)->$cur_lang !!}</h1>
    </div>

    @include( 'Information.modules.signin' )
    @include( 'Information.modules.signup' )

</div>
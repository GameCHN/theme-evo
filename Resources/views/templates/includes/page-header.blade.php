<header class="header-title">
    <h1>
        {{ cutlass_title() }}
        <div class="pull-right hide">
            @if(function_exists('qtrans_generateLanguageSelectCode'))
                {{ qtrans_generateLanguageSelectCode('both') }}
            @endif
        </div>
    </h1>
</header>

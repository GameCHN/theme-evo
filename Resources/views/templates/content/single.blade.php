@include('templates.includes.page-header')

@wpposts

<article {{ post_class() }}>
    <div class="row box">
        <header>
            @include('templates.includes.entry-meta')
        </header>
        <div class="entry-content">
            @if ( has_post_thumbnail() && !post_password_required() && !is_attachment() )
                <div class="entry-thumbnail">
                    {{the_post_thumbnail()}}
                </div>
            @endif
            {{ the_content() }}
        </div>
        <footer>
            {{ wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'cutlass'), 'after' => '</p></nav>')) }}
        </footer>
    </div>
    <div class="row box">
        @include('templates.includes.comments')
    </div>
</article>
@wpempty
@include('templates.content.empty')
@wpend

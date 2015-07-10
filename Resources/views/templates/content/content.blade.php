<div class="row box">
    <article {{ post_class() }}>
        <header>
            <h2 class="entry-title"><a href="{{ the_permalink() }}">{{ the_title() }}</a></h2>
            @include('templates.includes.entry-meta')
        </header>
        <div class="entry-summary">
            @if( has_post_thumbnail() && !post_password_required() && !is_attachment() )
            <div class="entry-thumbnail">
                {{the_post_thumbnail()}}
            </div>
            @endif
            {{ the_content() }}
        </div>
    </article>
</div>

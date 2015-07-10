<p class="byline author vcard">
    <time class="published" datetime="{{ get_the_time('c') }}">发表于 {{ human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' 前 ( '.get_the_date('m/d').' )' }}</time>
    {{ __('By', 'cutlass') }} <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn">{{ get_the_author() }}</a>
     {{edit_post_link(__('Edit', 'default'), '<span class="edit-link">', '</span>')}}

</p>


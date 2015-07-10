@eval(global $wp_query;)
<div class="box row">
    @if ($wp_query->max_num_pages > 1)
        @if (function_exists('wp_page_numbers'))
            {{ wp_page_numbers() }}
        @elseif (function_exists('wp_pagenavi'))
            {{ wp_pagenavi() }}
        @else
            <nav class="post-nav">
                <ul class="pager">
                    <li class="previous">{{ next_posts_link(__('&larr; Older posts', 'cutlass')) }}</li>
                    <li class="next">{{ previous_posts_link(__('Newer posts &rarr;', 'cutlass')) }}</li>
                </ul>
            </nav>
        @endif
    @endif
</div>
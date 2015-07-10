@include('templates.includes.page-header')

@wpposts
{{ the_content() }}
{{ wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>'))  }}
@wpempty
@include('templates.content.empty')
@wpend

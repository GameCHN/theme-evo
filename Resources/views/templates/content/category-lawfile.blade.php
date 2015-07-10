@include('templates.includes.page-header')

@wpposts
<article {{ post_class() }}>
    <header>
        @include('templates.includes.entry-meta')
    </header>
    <div class="entry-content">
        {{ the_content() }}
    </div>
    <footer>
        {{ wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'cutlass'), 'after' => '</p></nav>')) }}
    </footer>
    @include('templates.includes.comments')
</article>
<div class="desc">
    中文版本仅为中文译本，不属正式法律文件。
    中、英文版本之间凡有不一致处，概以英文版本为准。
    虽然本译文译者已尽力确保译文的准确性，但因中、英两种语言有其各自不同的句法、语法规则和用语习惯，本译文未必在各方面均与原文完全一致。
    因此，任何人均不应以本译文作为其采取任何行动或作出任何决定的依据。
    此外，也请注意︰本译文未经正式认证，请仅供个人参考之用。
    本中文译本中部分词语的法律中的定义，与其日常使用时的字面意思未必完全相同，敬请注意。
</div>
@wpempty
@include('templates.content.empty')
@wpend

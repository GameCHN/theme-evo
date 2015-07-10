@include('templates.includes.page-header')
@static('css/single-lawyer.css')
@wpposts
<article {{ post_class() }}>
    <header>
        @include('templates.includes.entry-meta')
    </header>

    <div class="data-main">
        <div class="data-left">
            <div class="data-archives">
                <div class="archives-img">
                    @if( has_post_thumbnail() && !post_password_required() && !is_attachment() )
                    <div class="new-entry-thumbnail">
                        {{ the_post_thumbnail() }}
                    </div>
                    @endif
                    <!--<img src="images/lawer-1.png"/>-->
                </div>
                <div class="archives-txt">
                    <h3>{{ the_title() }}档案</h3>
                    <label>LAWYER DOSSIER</label>

                    @if(meta('lawyer_english_name'))
                        <p>{{ the_title() }}</p>
                        <label>{{ meta('lawyer_english_name') }}</label>
                    @endif

                    <p>执业证号：</p>
                    <label>{{ meta('lawyer_zyzh') }}</label>
                </div>
            </div>
            <div class="data-infor">
                <p>电话：</p>

                <p class="font1">{{ meta('lawyer_tel') }}</p>

                <p>地址：</p>

                <p class="font1">{{ meta('lawyer_locale') }}</p>

                <p>Email：</p>

                <p class="font1">{{ meta('lawyer_email') }}</p>

                <p>执业机构：</p>

                <p class="font1">{{ meta('lawyer_org') }}</p>

                @if(0)
                    <p>专长领域：</p>

                    <p class="font1">债务追讨 合同纠纷 婚姻家庭 遗产继承 房产纠纷 合伙联营 股份转让 合同审查 调解谈判 私人律</p>
                @endif

            </div>
            @if(0)
                <div class="condition">
                    <ul>
                        <li><i class="integral"></i>积分：<label>20454</label></li>
                        <li><i class="medal"></i>奖章：<label>22</label></li>
                        <li><i class="click"></i>点击量：<label>45079</label></li>
                    </ul>
                </div>
                <div class="data-bt">
                    <ul>
                        <li>
                            <i class="consulting"></i><a href="#" class="font2">向本律师咨询</a>
                        </li>
                        <li>
                            <i class="message"></i><a href="#" class="font2">给本律师留言</a>
                        </li>
                    </ul>
                </div>
            @endif
        </div>

        <div class="data-right">
            <div class="headlines"><i class="book"></i>律师简介</div>

            {{ the_content() }}

            @if (meta('laywer_case'))
                <div class="headlines"><i class="book"></i>成功案例</div>
                <div class="case">
                    <!--{demo}-->
                    <ul>
                        <li><a href="#" class="font3"><b>· </b>中国农业银行三水市支行与梁达来储蓄存</a><span>[2015-2-15]</span></li>
                        <li><a href="#" class="font3"><b>· </b>雇员上屋顶摔伤 雇主担责</a><span>[2015-2-15]</span></li>
                        <li><a href="#" class="font3"><b>· </b>72岁昔日富豪怒告败家子 写13万字讲述失 </a><span>[2015-2-15]</span></li>
                        <li><a href="#" class="font3"><b>· </b>当事人意思自治和稳定劳动关系</a><span>[2015-2-15]</span></li>
                        <li><a href="#" class="font3"><b>· </b>机动车驾驶证申领和使用规定</a><span>[2015-2-15]</span></li>
                        <li><a href="#" class="font3"><b>· </b>泾阳法院违规拍卖国有资产 政府欲赎回被 </a><span>[2015-2-15]</span></li>
                        <li><a href="#" class="font3"><b>· </b>著作权侵权纠纷案谈专有出版权问题</a><span>[2015-2-15]</span></li>
                        <li><a href="#" class="font3"><b>· </b>昔日富豪怒告败家子 写13万字讲述失</a><span>[2015-2-15]</span></li>
                    </ul>
                    <!--{/demo}-->
                    {{ meta('lawyer_case') }}
                </div>
            @endif
            @include('templates.includes.comments')
        </div>
    </div>




</article>
@wpempty
@include('templates.content.empty')
@wpend

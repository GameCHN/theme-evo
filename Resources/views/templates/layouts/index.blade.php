


@layout('templates.layouts.base')

@section('header-extra')
    <div class="page-header parallax" style="display: block;  height: 575px;   {{-- background :url(/site/assets/img02.jpg)  no-repeat center; --}}" __style="background-image:url(http://placehold.it/1200x300&amp;text=IMAGE+PLACEHOLDER);">
        <div class="mutual-box container" style="position: relative;z-index: 120;height: 0;">
            <div class="find-wen bg-black">
                <a href="/findlawyer/" class="fw-tab" id="switch-btn"></a>
                <div class="qh">
                    <!-- qh-hide -->
                    <strong>快速找律师</strong>
                    <div class="pull-down" style="z-index: 2;">
                        <!-- p-hover -->
                        <div class="p-inner">
                            <span>请选择专长</span><em class="ico-home"></em></div>
                        <div class="p-select">
                            <ul class="p-l clearfix">
                                <li><i value="hunyin">婚姻家庭</i></li><li><i value="ldgs">劳动工伤</i></li><li><i value="jiaotong">交通事故</i></li><li><i value="tdfc">土地房产</i></li><li><i value="htsw">合同事务</i></li><li><i value="zqzw">债权债务</i></li><li><i value="xsbh">刑事辩护</i></li><li><i value="gongsi">公司经营</i></li><li><i value="yljf">医疗纠纷</i></li>
                            </ul>
                            <p class="buxian">
                                不限</p>
                            <!-- ie6 bx-on -->
                        </div>
                    </div>
                    <div class="pull-down" style="z-index: 1">
                        <!-- p-hover -->
                        <div class="p-inner">
                            <span>请选择地区</span><em class="ico-home"></em></div>
                        <div class="p-select" style="display: none">
                            <div class="dq-box">
                                <b>详细选择</b>
                                <div class="c-select clearfix area-selector">
                                    <select id="tb_provinceid" class="pull w100 selector" style="z-index: 5; display: none;"><option value="beijing">北京 </option><option value="shanghai">上海 </option><option value="guangdong">广东 </option><option value="guangxi">广西 </option><option value="yunnan">云南 </option><option value="xicang">西藏 </option><option value="qinghai">青海</option><option value="ningxia">宁夏 </option><option value="xinjiang">新疆 </option><option value="taiwan">台湾 </option><option value="xianggang">香港 </option><option value="aomen">澳门 </option><option value="tianjin">天津 </option><option value="chongqing">重庆 </option><option value="hebei">河北 </option><option value="shanxi">山西 </option><option value="jilin">吉林 </option><option value="heilongjiang">黑龙江 </option><option value="jiangsu">江苏 </option><option value="fujian">福建 </option><option value="jiangxi">江西 </option><option value="shandong">山东 </option><option value="hubei">湖北 </option><option value="hunan">湖南 </option><option value="hainan">海南</option><option value="sichuan">四川 </option><option value="guizhou">贵州 </option><option value="shanxi1">陕西 </option><option value="gansu">甘肃 </option><option value="neimenggu">内蒙古 </option><option value="liaoning">辽宁 </option><option value="zhejiang">浙江 </option><option value="anhui">安徽 </option><option value="henan">河南 </option></select><div class="pull w120"><div class="pull-on" style="z-index:88"><i style="height: 24px;">北京 </i><em></em></div><div class="pull-down" style="z-index: 90; height: 240px; overflow: auto; display: none;"><p data-value="beijing"><a href="javascript:void(0);">北京 </a></p><p data-value="shanghai"><a href="javascript:void(0);">上海 </a></p><p data-value="guangdong"><a href="javascript:void(0);">广东 </a></p><p data-value="guangxi"><a href="javascript:void(0);">广西 </a></p><p data-value="yunnan"><a href="javascript:void(0);">云南 </a></p><p data-value="xicang"><a href="javascript:void(0);">西藏 </a></p><p data-value="qinghai"><a href="javascript:void(0);">青海</a></p><p data-value="ningxia"><a href="javascript:void(0);">宁夏 </a></p><p data-value="xinjiang"><a href="javascript:void(0);">新疆 </a></p><p data-value="taiwan"><a href="javascript:void(0);">台湾 </a></p><p data-value="xianggang"><a href="javascript:void(0);">香港 </a></p><p data-value="aomen"><a href="javascript:void(0);">澳门 </a></p><p data-value="tianjin"><a href="javascript:void(0);">天津 </a></p><p data-value="chongqing"><a href="javascript:void(0);">重庆 </a></p><p data-value="hebei"><a href="javascript:void(0);">河北 </a></p><p data-value="shanxi"><a href="javascript:void(0);">山西 </a></p><p data-value="jilin"><a href="javascript:void(0);">吉林 </a></p><p data-value="heilongjiang"><a href="javascript:void(0);">黑龙江 </a></p><p data-value="jiangsu"><a href="javascript:void(0);">江苏 </a></p><p data-value="fujian"><a href="javascript:void(0);">福建 </a></p><p data-value="jiangxi"><a href="javascript:void(0);">江西 </a></p><p data-value="shandong"><a href="javascript:void(0);">山东 </a></p><p data-value="hubei"><a href="javascript:void(0);">湖北 </a></p><p data-value="hunan"><a href="javascript:void(0);">湖南 </a></p><p data-value="hainan"><a href="javascript:void(0);">海南</a></p><p data-value="sichuan"><a href="javascript:void(0);">四川 </a></p><p data-value="guizhou"><a href="javascript:void(0);">贵州 </a></p><p data-value="shanxi1"><a href="javascript:void(0);">陕西 </a></p><p data-value="gansu"><a href="javascript:void(0);">甘肃 </a></p><p data-value="neimenggu"><a href="javascript:void(0);">内蒙古 </a></p><p data-value="liaoning"><a href="javascript:void(0);">辽宁 </a></p><p data-value="zhejiang"><a href="javascript:void(0);">浙江 </a></p><p data-value="anhui"><a href="javascript:void(0);">安徽 </a></p><p data-value="henan"><a href="javascript:void(0);">河南 </a></p></div></div>
                                    <select id="tb_cityid" class="pull w100  selector" style="z-index: 4; display: none;"><option value="0">请选择</option><option value="dongchengqu">东城区 </option><option value="xichengqu">西城区 </option><option value="chongwenqu">崇文区</option><option value="xuanwuqu">宣武区 </option><option value="chaoyangqu">朝阳区 </option><option value="fengtaiqu">丰台区 </option><option value="shijingshanqu">石景山区 </option><option value="haidianqu">海淀区 </option><option value="mentougouqu">门头沟区 </option><option value="fangshanqu">房山区 </option><option value="tongzhouqu">通州区 </option><option value="shunyiqu">顺义区 </option><option value="changpingxian">昌平区</option><option value="daxingxian">大兴区</option><option value="pingguxian">平谷区</option><option value="huairouxian">怀柔区</option><option value="miyunxian">密云县 </option><option value="yanqingxian">延庆县 </option></select><div class="pull w120"><div class="pull-on" style="z-index:88"><i style="height: 24px;">请选择</i><em></em></div><div class="pull-down" style="z-index: 90; height: 240px; overflow: auto; display: none;"><p data-value="0"><a href="javascript:void(0);">请选择</a></p><p data-value="dongchengqu"><a href="javascript:void(0);">东城区 </a></p><p data-value="xichengqu"><a href="javascript:void(0);">西城区 </a></p><p data-value="chongwenqu"><a href="javascript:void(0);">崇文区</a></p><p data-value="xuanwuqu"><a href="javascript:void(0);">宣武区 </a></p><p data-value="chaoyangqu"><a href="javascript:void(0);">朝阳区 </a></p><p data-value="fengtaiqu"><a href="javascript:void(0);">丰台区 </a></p><p data-value="shijingshanqu"><a href="javascript:void(0);">石景山区 </a></p><p data-value="haidianqu"><a href="javascript:void(0);">海淀区 </a></p><p data-value="mentougouqu"><a href="javascript:void(0);">门头沟区 </a></p><p data-value="fangshanqu"><a href="javascript:void(0);">房山区 </a></p><p data-value="tongzhouqu"><a href="javascript:void(0);">通州区 </a></p><p data-value="shunyiqu"><a href="javascript:void(0);">顺义区 </a></p><p data-value="changpingxian"><a href="javascript:void(0);">昌平区</a></p><p data-value="daxingxian"><a href="javascript:void(0);">大兴区</a></p><p data-value="pingguxian"><a href="javascript:void(0);">平谷区</a></p><p data-value="huairouxian"><a href="javascript:void(0);">怀柔区</a></p><p data-value="miyunxian"><a href="javascript:void(0);">密云县 </a></p><p data-value="yanqingxian"><a href="javascript:void(0);">延庆县 </a></p></div></div>
                                </div>
                                <p class="qd-btn">
                                    <a href="#">确定</a></p>
                                <b>热门城市</b>
                                <p class="city-list">
                                    <a id="btn_hotcity" href="javascript:void(0)" onclick="hotCity('guangzhou')">广州</a><a id="btn_hotcity" href="javascript:void(0)" onclick="hotCity('suzhou')">苏州</a><a id="btn_hotcity" href="javascript:void(0)" onclick="hotCity('shenzhen')">深圳</a><a id="btn_hotcity" href="javascript:void(0)" onclick="hotCity('hangzhou')">杭州</a><a id="btn_hotcity" href="javascript:void(0)" onclick="hotCity('wuhan')">武汉</a><a id="btn_hotcity" href="javascript:void(0)" onclick="hotCity('nanjing')">南京</a><a id="btn_hotcity" href="javascript:void(0)" onclick="hotCity('chengdu')">成都</a><a id="btn_hotcity" href="javascript:void(0)" onclick="hotCity('shenyang')">沈阳</a><a id="btn_hotcity" href="javascript:void(0)" onclick="hotCity('changsha')">长沙</a><a id="btn_hotcity" href="javascript:void(0)" onclick="hotCity('dongzuo')">东莞</a><a id="btn_hotcity" href="javascript:void(0)" onclick="hotCity('jinan')">济南</a><a id="btn_hotcity" href="javascript:void(0)" onclick="hotCity('fuzhou')">福州</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <a href="javascript:void(0)" id="serch" class="tj-btn">提交</a>
                </div>
                <div class="qh qh-hide">
                    <strong>快速提问</strong>
                    <p class="tw-tip">
                        用一句话概括您的问题，不超过50字</p>
                    <p class="tiwen">
                        <textarea id="txt_question"></textarea></p>
                    <a href="javascript:void(0)" id="txt_ask" class="tj-btn">提交</a>
                </div>
            </div>
        </div>
        @if(is_front_page() and of_get_option('displayslider') == '1')
            <div class="subheader-containerc clearfix">
            </div>
            <span class="clear"></span>
            @if(of_get_option('slidertype') == 'flex')
                @eval(get_template_part('homepage', 'slider'))
            @endif
        @endif

        <div class="container" style="position: relative;">
            <h1 class="page-title">@yield('page-title')</h1>
        </div>
    </div>

@endsection

@section('content')
    <div class="container">
        <main class="main" role="main">
            @yield('page-content')
        </main>
        <!-- /.main -->
    </div><!-- /.container -->
@endsection

{{-- <? --}}

@section('site-header')
    <!-- Start Site Header -->
    <div class="site-header-wrapper">
        <header class="site-header">
            <div class="container sp-cont">
                <div class="site-logo">
                    <h1><a href="/"><img src="@static('images/logo.png')" alt="Logo"></a></h1>
                    <span class="site-tagline" style="display: none;">{{ __('汇聚全球法律资源') }}<br>{{ __('助您轻松行走天下') }}</span>
                </div>

                <div class="r-sou">
                    <div class="seek">
                        <input type="text" value="{{ Input::get('s') ?: __('请输入搜索关键词') }}" onfocus="if(this.value == '{{ __('请输入搜索关键词') }}'){this.value = '';this.className = 'c8c focus';}" onblur="if(this.value == ''){this.value = '{{ __('请输入搜索关键词') }}';this.className = 'c8c';}" class="c8c" />
                        <a class="s-btn" style="margin-right: 10px;"><i class="ico-top">{{ __('搜索') }}</i>&nbsp;</a>
                        <a class="s-btn2" id="myquestion" href="/ask/question" style="border-left-width: 0px;  text-decoration: none; text-align: center; color: #fff; line-height: 36px; font-size: 14px;">我要提问 </a>
                    </div>
                </div>


                <div class="header-right">
                    <div class="user-login-panel">
                        <a href="#" class="user-login-btn" data-toggle="modal" data-target="#loginModal"><i class="icon-profile"></i></a>
                    </div>
                    <div class="topnav dd-menu">
                        <ul class="top-navigation sf-menu">
                            <li class="hide"><a href="/ask/question">{{ __('法律咨询') }}</a></li>
                            @if(!is_user_logged_in())
                                {{-- wp_register() --}}
                            @else
                                <li class="hide"><a href="/sns/ucenter/rankverify">{{ __('我是律师') }}</a></li>
                                <li><a href="{{ wp_logout_url($_SERVER['REQUEST_URI']) }}">{{ __('退出') }}</a></li>

                            @endif
                        </ul>
                    </div>
                </div>
                <div class="pull-left langBar">
                    @if( 0 && function_exists('qtrans_generateLanguageSelectCode'))
                        {{ qtrans_generateLanguageSelectCode('both') }}
                    @endif
                </div>
            </div>
        </header>
        <!-- End Site Header -->
        <div class="navbar">
            <div class="container sp-cont">
                <div class="search-function">
                    <a href="#" class="search-trigger"><i class="fa fa-search"></i></a>
                    <span><i class="fa fa-phone"></i> {{ __('搜索法律条文 或 咨询律师') }}</span>
                </div>
                <a href="#" class="visible-sm visible-xs" id="menu-toggle"><i class="fa fa-bars"></i></a>
                <!-- Main Navigation -->

                @if(0)
                    <nav class="main-navigation dd-menu toggle-menu" role="navigation">
                        <ul class="sf-menu">
                            <li><a href="/">{{ __('首页') }}</a>
                                @if(0)
                                    <ul class="dropdown">
                                        <li><a href="javascript:void(0)">Home versions</a>
                                            <ul class="dropdown">
                                                <li><a href="index.html">Default</a></li>
                                                <li><a href="index2.html">Version 2</a></li>
                                                <li><a href="index3.html">Version 3</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void(0)">Slider versions</a>
                                            <ul class="dropdown">
                                                <li><a href="index.html">Default(Flexslider)</a></li>
                                                <li><a href="hero-carousel.html">Full Width Carousel</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void(0)">Search Form Positions</a>
                                            <ul class="dropdown">
                                                <li><a href="index.html">Default(With Main Menu)</a></li>
                                                <li><a href="search-below-slider.html">Below Slider</a></li>
                                                <li><a href="search-over-slider.html">Over Slider</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void(0)">Header versions</a>
                                            <ul class="dropdown">
                                                <li><a href="index.html">Default</a>
                                                <li><a href="header-v2.html">Version 2</a></li>
                                                <li><a href="header-v3.html">Version 3</a></li>
                                                <li><a href="header-v4.html">Version 4</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                @endif
                            </li>
                            <li><a href="javascript:void(0)">{{ ot_get_option('menu_contact_title',__('律师联络')) }}</a>
                                <ul class="dropdown">
                                    @if($items = items('menu_contact_items'))
                                        @foreach($items as $nav)
                                            <li><a href="$nav[url]">{{ $nav['title'] }}</a></li>
                                        @endforeach
                                    @else
                                        <li><a href="#">香港律师</a></li>
                                        <li><a href="#">台湾律师</a></li>
                                        <li><a href="#">美国律师</a></li>
                                        <li><a href="#">英国律师</a></li>
                                        <!--{demo}-->
                                        <li><a href="shortcodes.html">Shortcodes</a></li>
                                        <li><a href="typography.html">Typography</a></li>
                                        <li><a href="dealers-search.html">Dealer Search</a></li>
                                        <li><a href="dealers-search-results.html">Dealer Search Results</a></li>
                                        <!--{/demo}-->
                                    @endif
                                </ul>
                            </li>
                            @if(0)
                                <li class="megamenu"><a href="index.html">海内外法律</a>
                                    <ul class="dropdown">
                                        <li>
                                            <div class="megamenu-container container">
                                                <div class="row">
                                                    <div class="mm-col col-md-2">
                                                        <ul class="sub-menu">
                                                            <li><a href="results-list.html">Brand new cars</a></li>
                                                            <li><a href="results-list.html">Used cars</a></li>
                                                            <li><a href="results-list.html">Latest reviews</a></li>
                                                            <li><a href="blog.html">Auto news</a></li>
                                                            <li><a href="about.html">Car insurance</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="mm-col col-md-5">
                                                        <span class="megamenu-sub-title">Browse by body type</span>
                                                        <ul class="body-type-widget">
                                                            <li>
                                                                <a href="results-list.html"><img src="@static('images/body-types/wagon.png')" alt="">
                                                                    <span>Wagon</span></a></li>
                                                            <li>
                                                                <a href="results-list.html"><img src="@static('images/body-types/minivan.png')" alt="">
                                                                    <span>Minivan</span></a></li>
                                                            <li>
                                                                <a href="results-list.html"><img src="@static('images/body-types/coupe.png')" alt="">
                                                                    <span>Coupe</span></a></li>
                                                            <li>
                                                                <a href="results-list.html"><img src="@static('images/body-types/convertible.png')" alt="">
                                                                    <span>Convertible</span></a></li>
                                                            <li>
                                                                <a href="results-list.html"><img src="@static('images/body-types/crossover.png')" alt="">
                                                                    <span>Crossover</span></a></li>
                                                            <li>
                                                                <a href="results-list.html"><img src="@static('images/body-types/suv.png')" alt="">
                                                                    <span>SUV</span></a></li>
                                                        </ul>
                                                        <a href="results-list.html" class="basic-link">view all</a>
                                                    </div>
                                                    <div class="mm-col col-md-5">
                                                        <span class="megamenu-sub-title">Browse by make</span>
                                                        <ul class="make-widget">
                                                            <li class="item">
                                                                <a href="results-list.html"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                                            </li>
                                                            <li class="item">
                                                                <a href="results-list.html"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                                            </li>
                                                            <li class="item">
                                                                <a href="results-list.html"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                                            </li>
                                                            <li class="item">
                                                                <a href="results-list.html"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                                            </li>
                                                            <li class="item">
                                                                <a href="results-list.html"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                                            </li>
                                                            <li class="item">
                                                                <a href="results-list.html"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                                            </li>
                                                            <li class="item">
                                                                <a href="results-list.html"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                                            </li>
                                                            <li class="item">
                                                                <a href="results-list.html"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                                            </li>
                                                        </ul>
                                                        <a href="results-list.html" class="basic-link">view all</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            <li><a href="javascript:void(0)">{{ot_get_option('menu_laws_title',__('海内外法律'))}}</a>
                                <ul class="dropdown">
                                    @if($items = items('menu_laws_items'))
                                        @foreach($items as $nav)
                                            <li><a href="{{ $nav['url'] }}">{{$nav['title']}}</a></li>
                                        @endforeach
                                    @else
                                        <li><a href="#">国家/地区法律</a></li>
                                        <li><a href="#">行业法律/法规</a></li>
                                        <li><a href="#">民事法律</a></li>
                                        <li><a href="#">刑法</a></li>
                                    @endif
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)">{{ot_get_option('menu_news_title',__('资讯动态'))}}</a>
                                <ul class="dropdown">
                                    @if($items = items('menu_news_items'))
                                        @foreach($items as $nav)
                                            <li><a href="$nav[url]">{{$nav['title']}}</a></li>
                                        @endforeach
                                    @else
                                        <li><a href="#">法律视频</a></li>
                                        <li><a href="#">法律资讯</a></li>
                                    @endif
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)">{{ot_get_option('menu_lawyers_title',__('合作律师'))}}</a>
                                <ul class="dropdown">
                                    @if($items = items('menu_lawyers_items'))
                                        @foreach($items as $nav)
                                            <li><a href="$nav[url]">{{$nav['title']}}</a></li>
                                        @endforeach
                                    @else
                                        <li><a href="#">国内律师</a></li>
                                        <li><a href="#">香港律师</a></li>
                                        <li><a href="#">台湾律师</a></li>
                                        <li><a href="#">美国律师</a></li>
                                    @endif
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)">{{ot_get_option('menu_member_title',__('会员服务'))}}</a>
                                <ul class="dropdown">
                                    @if($items = items('menu_member_items'))
                                        @foreach($items as $nav)
                                            <li><a href="{{ $nav['url'] }}">{{ $nav['title'] }}</a></li>
                                        @endforeach
                                    @else
                                        <li><a href="#">服务说明</a></li>
                                        <li><a href="#">反馈</a></li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </nav>
                @endif



                {{ wp_nav_menu( array(
                    'theme_location' => 'header-menu',
                    'container' => 'nav',
                    'container_class' => 'main-navigation dd-menu toggle-menu',
                    'menu_class' => 'sf-menu',
                 ))
                 }}

                @if(0)
                    <!-- Search Form -->
                    <div class="search-form">
                        <div class="search-form-inner">
                            <form>
                                <h3>Find a Car with our Quick Search</h3>

                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Postcode</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Body Type</label>
                                                <select name="Body Type" class="form-control selectpicker">
                                                    <option selected>Any</option>
                                                    <option>Wagon</option>
                                                    <option>Minivan</option>
                                                    <option>Coupe</option>
                                                    <option>Crossover</option>
                                                    <option>Van</option>
                                                    <option>SUV</option>
                                                    <option>Minicar</option>
                                                    <option>Sedan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Make</label>
                                                <select name="Make" class="form-control selectpicker">
                                                    <option selected>Any</option>
                                                    <option>Jaguar</option>
                                                    <option>BMW</option>
                                                    <option>Mercedes</option>
                                                    <option>Porsche</option>
                                                    <option>Nissan</option>
                                                    <option>Mazda</option>
                                                    <option>Acura</option>
                                                    <option>Audi</option>
                                                    <option>Bugatti</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Model</label>
                                                <select name="Model" class="form-control selectpicker">
                                                    <option selected>Any</option>
                                                    <option>GTX</option>
                                                    <option>GTR</option>
                                                    <option>GTS</option>
                                                    <option>RLX</option>
                                                    <option>M6</option>
                                                    <option>S Class</option>
                                                    <option>C Class</option>
                                                    <option>B Class</option>
                                                    <option>A Class</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Price Min</label>
                                                <select name="Min Price" class="form-control selectpicker">
                                                    <option selected>Any</option>
                                                    <option>$10000</option>
                                                    <option>$20000</option>
                                                    <option>$30000</option>
                                                    <option>$40000</option>
                                                    <option>$50000</option>
                                                    <option>$60000</option>
                                                    <option>$70000</option>
                                                    <option>$80000</option>
                                                    <option>$90000</option>
                                                    <option>$100000</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Price Max</label>
                                                <select name="Max Price" class="form-control selectpicker">
                                                    <option selected>Any</option>
                                                    <option>$10000</option>
                                                    <option>$20000</option>
                                                    <option>$30000</option>
                                                    <option>$40000</option>
                                                    <option>$50000</option>
                                                    <option>$60000</option>
                                                    <option>$70000</option>
                                                    <option>$80000</option>
                                                    <option>$90000</option>
                                                    <option>$100000</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" id="inlineCheckbox1" value="option1"> Brand new only
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" id="inlineCheckbox2" value="option2"> Certified
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Min Year</label>
                                                <select name="Min Year" class="form-control selectpicker">
                                                    <option selected>Any</option>
                                                    <option>2005</option>
                                                    <option>2006</option>
                                                    <option>2007</option>
                                                    <option>2008</option>
                                                    <option>2009</option>
                                                    <option>2010</option>
                                                    <option>2011</option>
                                                    <option>2012</option>
                                                    <option>2013</option>
                                                    <option>2014</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Max Year</label>
                                                <select name="Max Year" class="form-control selectpicker">
                                                    <option selected>Any</option>
                                                    <option>2005</option>
                                                    <option>2006</option>
                                                    <option>2007</option>
                                                    <option>2008</option>
                                                    <option>2009</option>
                                                    <option>2010</option>
                                                    <option>2011</option>
                                                    <option>2012</option>
                                                    <option>2013</option>
                                                    <option>2014</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Min Mileage</label>
                                                <select name="Min Mileage" class="form-control selectpicker">
                                                    <option selected>Any</option>
                                                    <option>10000</option>
                                                    <option>20000</option>
                                                    <option>30000</option>
                                                    <option>40000</option>
                                                    <option>50000</option>
                                                    <option>60000</option>
                                                    <option>70000</option>
                                                    <option>80000</option>
                                                    <option>90000</option>
                                                    <option>100000</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Max Mileage</label>
                                                <select name="Max Mileage" class="form-control selectpicker">
                                                    <option selected>Any</option>
                                                    <option>10000</option>
                                                    <option>20000</option>
                                                    <option>30000</option>
                                                    <option>40000</option>
                                                    <option>50000</option>
                                                    <option>60000</option>
                                                    <option>70000</option>
                                                    <option>80000</option>
                                                    <option>90000</option>
                                                    <option>100000</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Transmission</label>
                                                <select name="Transmission" class="form-control selectpicker">
                                                    <option selected>Any</option>
                                                    <option>5 Speed Manual</option>
                                                    <option>5 Speed Automatic</option>
                                                    <option>6 Speed Manual</option>
                                                    <option>6 Speed Automatic</option>
                                                    <option>7 Speed Manual</option>
                                                    <option>7 Speed Automatic</option>
                                                    <option>8 Speed Manual</option>
                                                    <option>8 Speed Automatic</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Body Color</label>
                                                <select name="Body Color" class="form-control selectpicker">
                                                    <option selected>Any</option>
                                                    <option>Red</option>
                                                    <option>Black</option>
                                                    <option>White</option>
                                                    <option>Yellow</option>
                                                    <option>Brown</option>
                                                    <option>Grey</option>
                                                    <option>Silver</option>
                                                    <option>Gold</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="submit" class="btn btn-block btn-info btn-lg" value="Find my vehicle now">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

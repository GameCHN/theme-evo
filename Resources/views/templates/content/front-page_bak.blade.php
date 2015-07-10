@include('templates.content.index.ShenBianFaLv')
@include('templates.content.index.ZhuanTi')

@section('page-content')
    <div class="main" role="main">
        <div id="content" class="content full padding-b0">
            <div class="container">
                <!-- Welcome Content and Services overview -->
                <div class="row box">
                    <div class="col-md-6">
                        <h1 class="uppercase strong">{{ __('欢迎光临法律同音') }}<br>{{ __('为您轻松解决国际法律问题') }}</h1>

                        <p class="lead">
                            {{ __('法律同音专注于搭建海内外法律事务<br>共享与沟通平台, <span class="accent-color">让法律与您轻松随行</span>') }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ __('法律同音的互联网及手机平台提供给海内外律师及客户一个供需的平台，律师们可以更容易找到客户，客户可以更容易找到合适律师。平台通过翻译和高科技为法律行业服务，打破海内外地域及语言的阻隔。中国律师可以更容易串连海外同寅，海外律师也可以在中国寻找到合作伙伴。') }}</p>

                        <p>{{ __('我们可以协助海外及国内的律师根据自己业务的性质互相串连，为本土及海外的客户提供更好的服务。这个全面包括了网上的广告，定时的可视会议，互相的拜访，及共同举办有关座谈及研讨会。提供会议系统并即时传译。按各地区法律条文，针对涉外应用，作出䋄上解释和培训。比如中国自由行消费者到香港购物，受什么消费者法律保护。到英国追债有那些法律可依，法律程序如何.........') }}
                            <span class="accent-color"></span>
                        </p>

                    </div>
                </div>
                <div class="spacer-75 hide"></div>
                <!-- Recently Listed Vehicles -->

                <!-- 法律专题 start -->
                <div class="row box">
                    @yield('专题')
                </div>
                <!-- 法律专题 end -->

                <!-- 身边法律 start -->
                <div class="row box">
                    @yield('身边法律')
                </div>
                <!-- 身边法律 end -->



                <div class="spacer-60 hide"></div>
                <div class="row box">
                    <!-- Latest News -->
                    <div class="col-md-8 col-sm-6">
                        <section class="listing-block latest-news">
                            <div class="listing-header">
                                <a href="{{ array_shift( ot_get_option('info_category',['/news']))}}" class="btn btn-sm btn-default pull-right">{{ __('查看全部') }}</a>

                                <h3>{{ ot_get_option('index_news_title') ?: __('法律资讯')}}</h3>
                            </div>
                            <div class="listing-container">
                                <div class="carousel-wrapper">
                                    <div class="row">
                                        <ul class="owl-carousel" id="news-slider" data-columns="2" data-autoplay="" data-pagination="yes" data-arrows="yes" data-single-item="no" data-items-desktop="2" data-items-desktop-small="1"
                                                data-items-tablet="2" data-items-mobile="1">
                                            @for($query = query_category(ot_get_option('info_category', ['news']), 3, ['meta_key' => '_thumbnail_id']),$i = 0;$query->have_posts();$i += 1)
                                                @eval($query->the_post())
                                            <li class="item">
                                                <div class="post-block format-standard">
                                                    <a href="{{the_permalink()}}" class="media-box post-image">{{get_thumb('337x225')}}</a>

                                                    <div class="post-actions">
                                                        <div class="post-date">{{the_date()}}</div>
                                                        <div class="comment-count">
                                                            <a href="{{comments_link()}}"><i class="icon-dialogue-text"></i> {{comments_number()}}</a>
                                                        </div>
                                                    </div>
                                                    <h3 class="post-title">
                                                        <a href="{{the_permalink()}}">{{the_title()}}</a>
                                                    </h3>

                                                    <div class="post-content">
                                                        <p>{{excerpt(30)}}</p>
                                                    </div>
                                                    <div class="post-meta">
                                                        {{ __('Posted in:') }} {{the_category(', ')}}
                                                    </div>
                                                </div>
                                            </li>
                                            @endfor

                                            <!--{demo}-->
                                            <li class="item">
                                                <div class="post-block format-standard">
                                                    <a href="single-post.html" class="media-box post-image"><img src="/static/image/600px/img600-10.jpg" alt=""></a>

                                                    <div class="post-actions">
                                                        <div class="post-date">November 29, 2014</div>
                                                        <div class="comment-count">
                                                            <a href="#"><i class="icon-dialogue-text"></i> 0</a></div>
                                                    </div>
                                                    <h3 class="post-title">
                                                        <a href="single-post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a>
                                                    </h3>

                                                    <div class="post-content">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus...</p>
                                                    </div>
                                                    <div class="post-meta">
                                                        Posted in: <a href="blog-masonry.html">New Launch</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item">
                                                <div class="post-block format-standard">
                                                    <a href="single-post.html" class="media-box post-image"><img src="/static/image/600px/img600-11.jpg" alt=""></a>

                                                    <div class="post-actions">
                                                        <div class="post-date">November 27, 2014</div>
                                                        <div class="comment-count">
                                                            <a href="#"><i class="icon-dialogue-text"></i> 0</a></div>
                                                    </div>
                                                    <h3 class="post-title">
                                                        <a href="single-post.html">2015 Proin enim quam, vulputate</a>
                                                    </h3>

                                                    <div class="post-content">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus...</p>
                                                    </div>
                                                    <div class="post-meta">
                                                        Posted in: <a href="blog-masonry.html">Trial run</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <!--{/demo}-->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="spacer-40"></div>

                        <section class="listing-block latest-testimonials">
                            <div class="listing-header">
                                <a href="/ask/question" class="btn btn-sm btn-default pull-right">{{ __('查看全部') }}</a>

                                <h3>{{ __('法律咨询') }}</h3>
                            </div>
                            <div class="listing-container">
                                <div class="carousel-wrapper">
                                    <div class="row">
                                        <ul class="owl-carousel carousel-fw" id="testimonials-slider" data-columns="2" data-autoplay="5000" data-pagination="no" data-arrows="no" data-single-item="no" data-items-desktop="2"
                                                data-items-desktop-small="1" data-items-tablet="1" data-items-mobile="1">
                                            @foreach($weibo as $i => $value)
                                            <li class="item">
                                                <div class="testimonial-block">
                                                    <blockquote>
                                                        <p>
                                                            <a href="{{ $value['user']['space_url'] }}" class="lawQuestion_content">{{ $value['fetchContent'] }}</a>
                                                        </p>
                                                    </blockquote>

                                                    <div class="testimonial-avatar">
                                                        <a href="{{ $value['user']['space_url'] }}"><img src="{{ $value['user']['avatar64'] }}"/></a>
                                                    </div>
                                                    <div class="testimonial-info">
                                                        <div class="testimonial-info-in">
                                                            <strong><a href="{{ $value['user']['space_url'] }}">{{ $value['user']['nickname'] }}</a></strong><span> {{ $value['repost_count'] }} {{ __('个回复') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                                    <!--{demo}-->
                                            <li class="item">
                                                <div class="testimonial-block">
                                                    <blockquote>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                                                    </blockquote>
                                                    <div class="testimonial-avatar">
                                                        <img src="/static/image/100px/img100-2.jpg" alt="" width="60" height="60">
                                                    </div>
                                                    <div class="testimonial-info">
                                                        <div class="testimonial-info-in">
                                                            <strong>Lori Bailey</strong><span>My car Experts</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item">
                                                <div class="testimonial-block">
                                                    <blockquote>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                                                    </blockquote>
                                                    <div class="testimonial-avatar">
                                                        <img src="/static/image/100px/img100-3.jpg" alt="" width="60" height="60">
                                                    </div>
                                                    <div class="testimonial-info">
                                                        <div class="testimonial-info-in">
                                                            <strong>Willie &amp; Heather Obrien</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <!--{/demo}-->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- Latest Testimonials -->
                        @if(0)
                            <section class="listing-block latest-testimonials">
                                <div class="listing-header">
                                    <h3>{{ot_get_option('lawyer_title',__('律师介绍'))}}</h3>
                                </div>
                                <div class="listing-container">
                                    <div class="carousel-wrapper">
                                        <div class="row">
                                            <ul class="owl-carousel carousel-fw" id="testimonials-slider" data-columns="2" data-autoplay="5000" data-pagination="no" data-arrows="no" data-single-item="no" data-items-desktop="2"
                                                    data-items-desktop-small="1" data-items-tablet="1" data-items-mobile="1">
                                                @for ($query = query_meta(['lawyer_recommend'=>'1'],3,['post_type'=>'lawyer']),$i=0; $query->have_posts();$i+=1)
                                                    {{ $query->the_post() }}
                                                    <li class="item">
                                                        <div class="testimonial-block">
                                                            <blockquote>
                                                                <p>{{excerpt(100)}}</p>
                                                            </blockquote>
                                                            <div class="testimonial-avatar">
                                                                <a href="{{the_permalink()}}">{{get_thumb('60x60')}}</a>
                                                            </div>
                                                            <div class="testimonial-info">
                                                                <div class="testimonial-info-in">
                                                                    <strong><a href="{{the_permalink()}}">{{the_title()}}</a></strong><span>{{meta('lawyer_address')}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endfor
                                                            <!--{demo}-->
                                                    <li class="item">
                                                        <div class="testimonial-block">
                                                            <blockquote>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                                                            </blockquote>
                                                            <div class="testimonial-avatar">
                                                                <img src="/static/image/100px/img100-2.jpg" alt="" width="60" height="60">
                                                            </div>
                                                            <div class="testimonial-info">
                                                                <div class="testimonial-info-in">
                                                                    <strong>Lori Bailey</strong><span>My car Experts</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item">
                                                        <div class="testimonial-block">
                                                            <blockquote>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                                                            </blockquote>
                                                            <div class="testimonial-avatar">
                                                                <img src="/static/image/100px/img100-3.jpg" alt="" width="60" height="60">
                                                            </div>
                                                            <div class="testimonial-info">
                                                                <div class="testimonial-info-in">
                                                                    <strong>Willie &amp; Heather Obrien</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <!--{/demo}-->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        @endif
                    </div>
                    <!-- Latest Reviews -->
                    <div class="col-md-4 col-sm-6 sidebar">

                        <div class="widget sidebar-widget widget_recent_posts">
                            <a href="/law-video" class="btn btn-sm btn-default pull-right">{{ __('查看全部') }}</a>

                            <h3 class="widgettitle">{{ ot_get_option('index-video-title',__('法律讲座视频')) }}</h3>
                            <ul>
                                @wpquery(['category_name' => ot_get_option('law-video-cat','law-video'),'posts_per_page' =>ot_get_option('lawvideo-num',3)])
                                <li>
                                    <a href="{{ get_permalink() }}"><img src="{{ get_thumb('60x60') ?: 'http://placehold.it/200x200&amp;text=IMAGE+PLACEHOLDER' }}" alt="" class="img-thumbnail"></a>
                                    <h5 style="font-size:18px;"><a href="{{ get_permalink() }}">{{ the_title() }}</a>
                                    </h5>

                                    <div class="post-actions">
                                        <div class="post-date">{{ the_date() }}</div>
                                    </div>
                                </li>
                                @wpempty
                                {{ __('请添加 law-video 类别文章') }}
                                @wpend
                            </ul>
                        </div>

                        <section class="listing-block latest-reviews hide">
                            <div class="listing-header">
                                <a href="/law-video" class="btn btn-sm btn-default pull-right">{{ __('查看全部') }}</a>

                                <h3>{{ __('法律讲座视频') }}</h3>
                            </div>
                            <div class="listing-container">
                                <div class="post-block post-review-block">
                                    @wpquery('category_name=law-video&posts_per_page=3')
                                    <div class="review-status">
                                        <strong>3.6</strong>
                                        <span>Out of 5</span>
                                    </div>
                                    <h3 class="post-title">
                                        <a href="{{ get_permalink() }}">{{ the_title() }}</a>
                                    </h3>

                                    <div class="post-content">
                                        <div class="post-actions">
                                            <div class="post-date"><a href="{{ get_permalink() }}">{{ the_date() }}</a>
                                            </div>
                                            <div class="comment-count"><i class="fa fa-thumbs-o-up"></i> 3
                                                <i class="fa fa-thumbs-o-down"></i> 0
                                            </div>
                                        </div>
                                    </div>
                                    @wpempty
                                    @wpend
                                </div>

                            </div>
                        </section>
                        <div class="spacer-20"></div>
                        <section class="listing-block latest-reviews">
                            <div class="listing-header">
                                <a href="/lawyer" class="btn btn-sm btn-default pull-right">{{ __('查看全部') }}</a>

                                <h3>{{ot_get_option('lawyerinfo_title',__('律师资料'))}}</h3>
                            </div>
                            <div class="listing-container">
                                @for ($q = query_category(null,3,['post_type'=>'lawyer']);$q->have_posts();)
                                    {{ $q->the_post() }}
                                    <div class="post-block post-review-block">
                                        <div class="review-status">
                                            <strong>3.6</strong>
                                            <span>Out of 5</span>
                                        </div>
                                        <h3 class="post-title">
                                            <a href="{{the_permalink()}}">{{excerpt(55)}}</a>
                                        </h3>

                                        <div class="post-content">
                                            <div class="post-actions">
                                                <div class="post-date">
                                                    <a href="{{the_permalink()}}">{{the_title()}} {{the_date()}}</a></div>
                                                <div class="comment-count"><i class="fa fa-thumbs-o-up"></i> 3
                                                    <i class="fa fa-thumbs-o-down"></i> 0
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endfor
                                            <!--{demo}-->
                                    <div class="post-block post-review-block">
                                        <div class="review-status">
                                            <strong>4.1</strong>
                                            <span>Out of 5</span>
                                        </div>
                                        <h3 class="post-title">
                                            <a href="single-post-review.html">Curabitur nec nulla lectus, non hendrerit lorem porttitor</a>
                                        </h3>

                                        <div class="post-content">
                                            <div class="post-actions">
                                                <div class="post-date">November 14, 2014</div>
                                                <div class="comment-count"><i class="fa fa-thumbs-o-up"></i> 7
                                                    <i class="fa fa-thumbs-o-down"></i> 1
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-block post-review-block">
                                        <div class="review-status">
                                            <strong>5.0</strong>
                                            <span>Out of 5</span>
                                        </div>
                                        <h3 class="post-title">
                                            <a href="single-post-review.html">2014 Proin enim quam, vulputate at lobortis quis</a>
                                        </h3>

                                        <div class="post-content">
                                            <div class="post-actions">
                                                <div class="post-date">October 31, 2014</div>
                                                <div class="comment-count"><i class="fa fa-thumbs-o-up"></i> 11
                                                    <i class="fa fa-thumbs-o-down"></i> 0
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--{/demo}-->
                            </div>
                        </section>
                        <div class="spacer-40"></div>
                        <!-- Connect with us -->
                        <section class="connect-with-us widget-block">
                            <h4><i class="fa fa-rss"></i> {{ __('Connect with us') }}</h4>

                            <form role="form">
                                <label for="NewsletterInput" class="sr-only">{{ __('Email') }}</label>
                                <input type="email" class="form-control" id="NewsletterInput" placeholder="{{ __('Subscribe via email') }}">
                                <button type="submit" class="btn btn-sm btn-primary">{{ __('Subscribe') }}</button>
                                <span class="meta-data">{{ __('Don\'t worry, we won\'t spam you') }}</span>
                            </form>
                            <hr>
                            <h4><i class="fa fa-twitter"></i> {{ __('Twitter feed') }}</h4>

                            <div class="twitter-widget" data-tweets-count="2"></div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="spacer-50 hide"></div>
            <div class="spacer-50 hide"></div>
            <div class="lgray-bg make-slider">
                <div class="container">
                    <!-- Search by make -->
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <h3> {{ __('Search by make') }} </h3>
                            <a href="#" class="btn btn-default btn-lg">{{ __('All make &amp; models') }}</a>
                        </div>
                        <div class="col-md-9 col-sm-8">
                            <div class="row">
                                <ul class="owl-carousel" id="make-carousel" data-columns="5" data-autoplay="6000" data-pagination="no" data-arrows="no" data-single-item="no" data-items-desktop="5" data-items-desktop-small="4"
                                        data-items-tablet="3" data-items-mobile="3">
                                    <li class="item">
                                        <a href="#"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                    </li>
                                    <li class="item">
                                        <a href="#"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                    </li>
                                    <li class="item">
                                        <a href="#"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                    </li>
                                    <li class="item">
                                        <a href="#"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                    </li>
                                    <li class="item">
                                        <a href="#"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                    </li>
                                    <li class="item">
                                        <a href="#"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                    </li>
                                    <li class="item">
                                        <a href="#"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                    </li>
                                    <li class="item">
                                        <a href="#"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

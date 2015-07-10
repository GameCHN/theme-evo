@section('身边法律')
    <section class="listing-block recent-vehicles">
        <div class="listing-header">
            <h3>{{ot_get_option('legalfile_title','身边法律')}}</h3>
        </div>
        <div class="listing-container">
            <div class="carousel-wrapper">
                <div class="row">
                    <ul class="owl-carousel carousel-fw" id="vehicle-slider" data-columns="4" data-autoplay="" data-pagination="yes" data-arrows="no" data-single-item="no" data-items-desktop="4" data-items-desktop-small="3"
                            data-items-tablet="2" data-items-mobile="1">
                        @for ($query = query_category(ot_get_option('category_legalfile',['legal-file']),8),$i=0;$query->have_posts();$i+=1)
                            {{$query->the_post()}}
                            <li class="item">
                                <div class="vehicle-block format-standard">
                                    <a href="{{ the_permalink() }}" class="media-box">{{ get_thumb('245x163') }}</a>
                                    {{ excerpt(140) }}
                                    <div class="vehicle-block-content">
                                        <span class="label label-default vehicle-age">{{get_post_meta(get_the_ID(),'age',true)}}</span>
                                        <span class="label label-success premium-listing">{{get_post_meta(get_the_ID(),'listing',true)}}</span>
                                        <h5 class="vehicle-title">
                                            <a href="{{the_permalink()}}">{{the_title()}}</a></h5>
                                        <span class="vehicle-meta">{{ the_category(', ') }} by <abbr class="user-type">{{ the_author_nickname() }}</abbr></span>
                                        <a href="#" title="View all Sedans" class="vehicle-body-type"><img src="@static('images/body-types/sedan.png')" width="30" alt=""></a>
                                        <span class="vehicle-cost">$48500</span>
                                    </div>
                                </div>
                            </li>
                            @endfor
                                    <!--{demo}-->
                            <li class="item">
                                <div class="vehicle-block format-standard">
                                    <a href="#" class="media-box"><img src="/static/image/600px/img600-2.jpg" alt=""></a>

                                    <div class="vehicle-block-content">
                                        <span class="label label-primary vehicle-age">Brand New</span>
                                        <h5 class="vehicle-title"><a href="#">Nissan Terrano first hand</a></h5>
                                        <span class="vehicle-meta">Nissan, Brown beige, by <abbr class="user-type" title="Listed by an dealer">Dealer</abbr></span>
                                        <a href="#" title="View all SUVs" class="vehicle-body-type"><img src="@static('images/body-types/suv.png')" width="30" alt=""></a>
                                        <span class="vehicle-cost">$28000</span>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="vehicle-block format-standard">
                                    <a href="#" class="media-box"><img src="/static/image/600px/img600-3.jpg" alt=""></a>

                                    <div class="vehicle-block-content">
                                        <span class="label label-default vehicle-age">2013</span>
                                        <h5 class="vehicle-title"><a href="#">Mercedes Benz E Class</a></h5>
                                        <span class="vehicle-meta">Mercedes, Silver Blue, by <abbr class="user-type" title="Listed by an individual">Individual</abbr></span>
                                        <a href="#" title="View all convertibles" class="vehicle-body-type"><img src="@static('images/body-types/convertible.png')" width="30" alt=""></a>
                                        <span class="vehicle-cost">$76000</span>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="vehicle-block format-standard">
                                    <a href="#" class="media-box"><img src="/static/image/600px/img600-4.jpg" alt=""></a>

                                    <div class="vehicle-block-content">
                                        <span class="label label-default vehicle-age">2014</span>
                                        <h5 class="vehicle-title"><a href="#">Newly launched Nissan Sunny</a>
                                        </h5>
                                        <span class="vehicle-meta">Nissan, Brown beige, by <abbr class="user-type" title="Listed by Autostars">Autostars</abbr></span>
                                        <a href="#" title="View all coupes" class="vehicle-body-type"><img src="@static('images/body-types/coupe.png')" width="30" alt=""></a>
                                        <span class="vehicle-cost">$31999</span>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="vehicle-block format-standard">
                                    <a href="#" class="media-box"><img src="/static/image/600px/img600-5.jpg" alt=""></a>

                                    <div class="vehicle-block-content">
                                        <span class="label label-default vehicle-age">2014</span>
                                        <span class="label label-success premium-listing">Premium Listing</span>
                                        <h5 class="vehicle-title"><a href="#">Mercedes-benz SL 300</a></h5>
                                        <span class="vehicle-meta">Mercedes, Grey color, by <abbr class="user-type" title="Listed by an individual user">Individual</abbr></span>
                                        <a href="#" title="View all Sedans" class="vehicle-body-type"><img src="@static('images/body-types/sedan.png')" width="30" alt=""></a>
                                        <span class="vehicle-cost">$48500</span>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="vehicle-block format-standard">
                                    <a href="#" class="media-box"><img src="/static/image/600px/img600-6.jpg" alt=""></a>

                                    <div class="vehicle-block-content">
                                        <span class="label label-primary vehicle-age">Brand New</span>
                                        <h5 class="vehicle-title"><a href="#">Nissan Terrano first hand</a></h5>
                                        <span class="vehicle-meta">Nissan, Brown beige, by <abbr class="user-type" title="Listed by an dealer">Dealer</abbr></span>
                                        <a href="#" title="View all SUVs" class="vehicle-body-type"><img src="@static('images/body-types/suv.png')" width="30" alt=""></a>
                                        <span class="vehicle-cost">$28000</span>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="vehicle-block format-standard">
                                    <a href="#" class="media-box"><img src="/static/image/600px/img600-7.jpg" alt=""></a>

                                    <div class="vehicle-block-content">
                                        <span class="label label-default vehicle-age">2013</span>
                                        <h5 class="vehicle-title"><a href="#">Mercedes Benz E Class</a></h5>
                                        <span class="vehicle-meta">Mercedes, Silver Blue, by <abbr class="user-type" title="Listed by an individual">Individual</abbr></span>
                                        <a href="#" title="View all convertibles" class="vehicle-body-type"><img src="@static('images/body-types/convertible.png')" width="30" alt=""></a>
                                        <span class="vehicle-cost">$76000</span>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="vehicle-block format-standard">
                                    <a href="#" class="media-box"><img src="/static/image/600px/img600-8.jpg" alt=""></a>

                                    <div class="vehicle-block-content">
                                        <span class="label label-default vehicle-age">2014</span>
                                        <h5 class="vehicle-title">
                                            <a href="vehicle-details.html">Newly launched Nissan Sunny</a></h5>
                                        <span class="vehicle-meta">Nissan, Brown beige, by <abbr class="user-type" title="Listed by Autostars">Autostars</abbr></span>
                                        <a href="#" title="View all coupes" class="vehicle-body-type"><img src="@static('images/body-types/coupe.png')" width="30" alt=""></a>
                                        <span class="vehicle-cost">$31999</span>
                                    </div>
                                </div>
                            </li>
                            <!--{/demo}-->
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

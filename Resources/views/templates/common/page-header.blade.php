@section('page-header')

    <div class="hero-area">
        <!-- Start Hero Slider -->
        <div class="hero-slider heroflex flexslider clearfix" data-autoplay="yes" data-pagination="no" data-arrows="yes" data-style="fade" data-speed="7000" data-pause="yes">
            <ul class="slides">
                <li class="parallax" style="background-image:url(http://placehold.it/1400x500&amp;text=IMAGE+PLACEHOLDER);"></li>
                <li class="parallax" style="background-image:url(http://placehold.it/1400x500&amp;text=IMAGE+PLACEHOLDER);"></li>
            </ul>
        </div>
        <!-- End Hero Slider -->
    </div>
    <!-- Utiity Bar -->
    <div class="utility-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-8">
                    <div class="toggle-make">
                        <a href="#"><i class="fa fa-navicon"></i></a>
                        <span>{{ __('Browse by body style') }}</span>
                    </div>
                </div>
                <div class="col-md-8 col-sm-6 col-xs-4">
                    <ul class="utility-icons social-icons social-icons-colored">
                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="by-type-options">
            <div class="container">
                <div class="row">
                    <ul class="owl-carousel carousel-alt" data-columns="6" data-autoplay="" data-pagination="no" data-arrows="yes" data-single-item="no" data-items-desktop="6" data-items-desktop-small="4" data-items-mobile="3"
                            data-items-tablet="4">
                        <li class="item"><a href="results-list.html"><img src="@static('images/body-types/wagon.png')" alt=""> <span>Wagon</span></a></li>
                        <li class="item"><a href="results-list.html"><img src="@static('images/body-types/minivan.png')" alt=""> <span>Minivan</span></a></li>
                        <li class="item"><a href="results-list.html"><img src="@static('images/body-types/coupe.png')" alt=""> <span>Coupe</span></a></li>
                        <li class="item"><a href="results-list.html"><img src="@static('images/body-types/convertible.png')" alt=""> <span>Convertible</span></a></li>
                        <li class="item"><a href="results-list.html"><img src="@static('images/body-types/crossover.png')" alt=""> <span>Crossover</span></a></li>
                        <li class="item"><a href="results-list.html"><img src="@static('images/body-types/suv.png')" alt=""> <span>SUV</span></a></li>
                        <li class="item"><a href="results-list.html#"><img src="@static('images/body-types/minicar.png')" alt=""> <span>Minicar</span></a></li>
                        <li class="item"><a href="results-list.html"><img src="@static('images/body-types/sedan.png')" alt=""> <span>Sedan</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

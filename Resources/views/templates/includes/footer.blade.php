<!-- Start site footer -->
<footer class="site-footer">
    @include('templates.includes.footer2')
    <div class="site-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 copyrights-left">
                    <p>{{ __('Copyright &copy; 2015 51lawfirm.com | All Rights Reserved | 粤ICP备11053990号-9') }}</p>
                </div>
                <div class="col-md-6 col-sm-6 copyrights-right">
                    <ul class="social-icons social-icons-colored pull-right">
                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li class="youtube"><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li class="flickr"><a href="#"><i class="fa fa-flickr"></i></a></li>
                        <li class="vimeo"><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
                        <li class="digg"><a href="#"><i class="fa fa-digg"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End site footer -->
<a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
</div>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Login to your account</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <div class="input-group space-10">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Login">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-block btn-facebook btn-social">
                    <i class="fa fa-facebook"></i> Login with Facebook
                </button>
                <button type="button" class="btn btn-block btn-twitter btn-social">
                    <i class="fa fa-twitter"></i> Login with Twitter
                </button>
            </div>
        </div>
    </div>
</div>
@static('vendor/prettyphoto/js/prettyphoto.js')<!-- PrettyPhoto Plugin -->
@static('js/ui-plugins.js')<!-- UI Plugins -->
@static('js/helper-plugins.js')<!-- Helper Plugins -->
@static('vendor/owl-carousel/js/owl.carousel.min.js')<!-- Owl Carousel -->
@static('vendor/password-checker.js')<!-- Password Checker -->
@static('js/bootstrap.js')<!-- UI -->
@static('js/init.js')<!-- All Scripts -->
@static('vendor/flexslider/js/jquery.flexslider.js')<!-- FlexSlider -->
@static('js/app-extra.js')

<!-- flex slider & slider settings -->
<script type="text/javascript">
    jQuery(document).ready(function(){


        function getSliderDirection() {
            return (jQuery(window).width() < 768) ? "horizontal" : "vertical";
        }


        if ( jQuery( '.flexslider' ).length && jQuery() ) {
            jQuery('.flexslider').flexslider({
                animation:'{{ of_get_option('slidereffect')=='' ? 'slide' : of_get_option('slidereffect') }}',
                direction: getSliderDirection(),
                controlNav:true,
                directionNav:false,
                animationLoop: true,
                controlsContainer:"",
                pauseOnHover: true,
                nextText:"&rsaquo;",
                prevText:"&lsaquo;",
                keyboardNav: true,
                slideshowSpeed: '{{ of_get_option('sliderpausetime')=='' ?  3000: of_get_option('sliderpausetime') }}',
                animationSpeed: '{{ of_get_option('slideranimationspeed')=='' ? 500 : of_get_option('slideranimationspeed') }}',
                start: function(slider) {
                    slider.removeClass('loading');
                }

            });
        }
    });
</script>


<!--<script
 type='text/javascript' src='http://maps.googleapis.com/maps/api/js?sensor=false'></script>-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="description" content="E-PMI - Sistem Pembangunan Modal Insan SUK Kelantan" />
    <meta property="og:title" content="E-PMI - Sistem Pembangunan Modal Insan SUK Kelantan" />
    <meta property="og:description" content="E-PMI - Sistem Pembangunan Modal Insan SUK Kelantan" />
    <meta property="og:image" content="" />
    <meta name="format-detection" content="telephone=no">

    <!-- FAVICONS ICON -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('templatePMI/images/favicon.png') }}" />

    <!-- PAGE TITLE HERE -->
    <title>
        @yield('title_prefix', config('adminlte.title_prefix', ''))
        @yield('title', config('adminlte.title'))
        @yield('title_postfix', config('adminlte.title_postfix', ''))</title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--[if lt IE 9]>
 <script src="js/html5shiv.min.js"></script>
 <script src="js/respond.min.js"></script>
 <![endif]-->

    <!-- STYLESHEETS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('templatePMI/css/plugins.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('templatePMI/css/style.css') }}">
    <link class="skin" rel="stylesheet" type="text/css" href="{{ asset('templatePMI/css/skin/skin-3.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('templatePMI/css/templete.css') }}">
    <!-- Google Font -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    </style>


</head>

<body id="bg">
    <div class="page-wraper langschool">
        <div id="loading-area" class="loading3">
            <div class="square-spin">
                <div></div>
            </div>
        </div>
        <!-- header -->
        @include('layouts.pmi2.header')
        <!-- header END -->
        <!-- Content -->
        @yield('content')
        <!-- Content END -->
        {{-- <div class="section-full p-tb50 bg-primary text-white">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7 m-md-b30">
                        <h4>Subscribe To Our Newsletter</h4>
                        <p class="m-b0">There are many variations of passages of Lorem Ipsum available, but the
                            majority have suffered alteration in some form, by injected humour, or randomised words</p>
                    </div>
                    <div class="col-md-5">
                        <h4>Your Email Address</h4>
                        <form class="dzSubscribe style1" action="script/mailchamp.php" method="post">
                            <div class="dzSubscribeMsg"></div>
                            <div class="input-group">
                                <input name="dzEmail" required="required" type="email" class="form-control"
                                    placeholder="Your Email Address">
                                <div class="input-group-addon">
                                    <button name="submit" value="Submit" type="submit"
                                        class="site-button-secondry btnhover6">Subscribe</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Footer -->
        @include('layouts.pmi2.footer')
        <!-- Footer END -->
        <button class="scroltop style1 white icon-up" type="button"><i class="fa fa-arrow-up"></i></button>
    </div>
    <!-- JAVASCRIPT FILES ========================================= -->
    <script src="{{ asset('templatePMI/js/jquery.min.js') }}"></script><!-- JQUERY.MIN JS -->
    <script src="{{ asset('templatePMI/plugins/wow/wow.js') }}"></script><!-- WOW JS -->
    <script src="{{ asset('templatePMI/plugins/bootstrap/js/popper.min.js') }}"></script><!-- BOOTSTRAP.MIN JS -->
    <script src="{{ asset('templatePMI/plugins/bootstrap/js/bootstrap.min.js') }}"></script><!-- BOOTSTRAP.MIN JS -->
    <script src="{{ asset('templatePMI/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script><!-- FORM JS -->
    <script src="{{ asset('templatePMI/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script><!-- FORM JS -->
    <script src="{{ asset('templatePMI/plugins/magnific-popup/magnific-popup.js') }}"></script><!-- MAGNIFIC POPUP JS -->
    <script src="{{ asset('templatePMI/plugins/counter/waypoints-min.js') }}"></script><!-- WAYPOINTS JS -->
    <script src="{{ asset('templatePMI/plugins/counter/counterup.min.js') }}"></script><!-- COUNTERUP JS -->
    <script src="{{ asset('templatePMI/plugins/imagesloaded/imagesloaded.js') }}"></script><!-- IMAGESLOADED -->
    <script src="{{ asset('templatePMI/plugins/masonry/masonry-3.1.4.js') }}"></script><!-- MASONRY -->
    <script src="{{ asset('templatePMI/plugins/masonry/masonry.filter.js') }}"></script><!-- MASONRY -->
    <script src="{{ asset('templatePMI/plugins/owl-carousel/owl.carousel.js') }}"></script><!-- OWL SLIDER -->
    <script src="{{ asset('templatePMI/plugins/lightgallery/js/lightgallery-all.min.js') }}"></script><!-- Lightgallery -->
    <script src="{{ asset('templatePMI/js/custom.js') }}"></script><!-- CUSTOM FUCTIONS  -->
    <script src="{{ asset('templatePMI/js/dz.carousel.js') }}"></script><!-- SORTCODE FUCTIONS  -->
    <script src="{{ asset('templatePMI/plugins/countdown/jquery.countdown.js') }}"></script><!-- COUNTDOWN FUCTIONS  -->
    <script src="{{ asset('templatePMI/js/dz.ajax.js') }}"></script><!-- CONTACT JS  -->
    <script src="{{ asset('templatePMI/plugins/rangeslider/rangeslider.js') }}"></script><!-- Rangeslider -->

    <script src="{{ asset('templatePMI/js/jquery.lazy.min.js') }}"></script>

    <!-- REVOLUTION JS FILES -->
    <script src="{{ asset('templatePMI/plugins/revolution/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('templatePMI/plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="{{ asset('templatePMI/plugins/revolution/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('templatePMI/plugins/revolution/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('templatePMI/plugins/revolution/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('templatePMI/plugins/revolution/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}">
    </script>
    <script src="{{ asset('templatePMI/plugins/revolution/revolution/js/extensions/revolution.extension.navigation.min.js') }}">
    </script>
    <script src="{{ asset('templatePMI/plugins/revolution/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('templatePMI/plugins/revolution/revolution/js/extensions/revolution.extension.slideanims.min.js') }}">
    </script>
    <script src="{{ asset('templatePMI/plugins/revolution/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>

    <script type="text/javascript">
        var tpj = jQuery;

        var revapi486;
        tpj(document).ready(function() {
            if (tpj("#rev_slider_486_1").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_486_1");
            } else {
                revapi486 = tpj("#rev_slider_486_1").show().revolution({
                    sliderType: "standard",
                    jsFileLocation: "plugins/revolution/revolution/js/",
                    sliderLayout: "auto",
                    dottedOverlay: "none",
                    delay: 9000,
                    navigation: {
                        keyboardNavigation: "on",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        mouseScrollReverse: "default",
                        onHoverStop: "on",
                        touch: {
                            touchenabled: "on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        },
                        arrows: {
                            style: "gyges",
                            enable: true,
                            hide_onmobile: false,
                            hide_over: 778,
                            hide_onleave: false,
                            tmp: '',
                            left: {
                                h_align: "right",
                                v_align: "bottom",
                                h_offset: 40,
                                v_offset: 0
                            },
                            right: {
                                h_align: "right",
                                v_align: "bottom",
                                h_offset: 0,
                                v_offset: 0
                            }
                        },
                        tabs: {
                            style: "erinyen",
                            enable: true,
                            width: 250,
                            height: 100,
                            min_width: 250,
                            wrapper_padding: 0,
                            wrapper_color: "transparent",
                            wrapper_opacity: "0",
                            visibleAmount: 3,
                            hide_onmobile: true,
                            hide_under: 778,
                            hide_onleave: false,
                            hide_delay: 200,
                            direction: "vertical",
                            span: false,
                            position: "inner",
                            space: 10,
                            h_align: "left",
                            v_align: "center",
                            h_offset: 30,
                            v_offset: 0
                        }
                    },
                    viewPort: {
                        enable: true,
                        outof: "pause",
                        visible_area: "80%",
                        presize: false
                    },
                    responsiveLevels: [1240, 1024, 778, 480],
                    visibilityLevels: [1240, 1024, 778, 480],
                    gridwidth: [1240, 1024, 778, 480],
                    gridheight: [700, 450, 400, 350],
                    lazyType: "none",
                    parallax: {
                        type: "scroll",
                        origo: "enterpoint",
                        speed: 400,
                        levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 46, 47, 48, 49, 50, 55],
                        type: "scroll",
                    },
                    shadow: 0,
                    spinner: "off",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    hideThumbsOnMobile: "off",
                    fullScreenOffsetContainer: ".site-header",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                });
            }
        }); /*ready*/
    </script>
</body>

</html>

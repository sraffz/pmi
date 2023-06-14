<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="description" content="EduZone - Education Collage & School HTML5 Template" />
    <meta property="og:title" content="EduZone - Education Collage & School HTML5 Template" />
    <meta property="og:description" content="EduZone - Education Collage & School HTML5 Template" />
    <meta property="og:image" content="" />
    <meta name="format-detection" content="telephone=no">

    <!-- FAVICONS ICON -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('templatePMI/images/favicon.png') }}" />

    <!-- PAGE TITLE HERE -->
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
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
    <link class="skin" rel="stylesheet" type="text/css" href="{{ asset('templatePMI/css/skin/skin-4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('templatePMI/css/templete.css') }}">
    <!-- Google Font -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    </style>


</head>

<body id="bg">
    <div class="page-wraper">
        <div id="loading-area" class="loading4"></div>
        <!-- header -->
        @include('layouts.pmi.header')
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
        @include('layouts.pmi.footer')
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
</body>

</html>

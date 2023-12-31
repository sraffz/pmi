<header class="site-header mo-left navstyle1 header dark header-langschool fullwidth">
    <!-- main header -->
    <div class="sticky-header main-bar-wraper navbar-expand-lg">
        <div class="main-bar clearfix ">
            <div class="container-fluid clearfix">
                <!-- website logo -->
                <div class="logo-header mostion logo-white">
                    <a href="{{ url('/') }}"><img src="{{ asset('templatePMI/images/logo-white.png') }}" alt="logo-epmi"></a>
                </div>
                <!-- nav toggle button -->
                <button class="navbar-toggler collapsed navicon justify-content-end" type="button"
                    data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <!-- extra nav -->
                <div class="extra-nav">
                    &nbsp;&nbsp;&nbsp;<a href="{{ url('login') }}" class="site-button">LOG MASUK</a>
                </div>
                <!-- Quik search -->
                <div class="dlab-quik-search ">
                    <form action="#">
                        <input name="search" value="" type="text" class="form-control"
                            placeholder="Type to search">
                        <span id="quik-search-remove"><i class="ti-close"></i></span>
                    </form>
                </div>
                <!-- main nav -->
                <div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
                    <div class="logo-header d-md-block d-lg-none">
                        <a href="index.html"><img src="{{ asset('templatePMI/images/logo.png') }}" alt=""></a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="{{ $page == 'Halaman Utama' ? 'active' : '' }}">
                            <a href="{{ url('/') }}">Halaman Utama</a>

                        </li>
                        <li class="{{ $page == 'Katalog' ? 'active' : '' }}">
                            <a href="{{ url('/katalog') }}">Katalog Kursus</a>

                        </li>
                        {{-- <li class="{{$page == 'takwim' ? 'active' : '' }}">
                            <a href="{{ url('/takwim') }}">Takwim</a>

                        </li> --}}
                        {{-- <li>
                            <a href="javascript:;">Features<i class="fa fa-chevron-down"></i></a>
                            <ul class="sub-menu tab-content">
                                <li>
                                    <a href="javascript:;">Header Light <i class="fa fa-angle-right"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="header-style-1.html">Header 1</a></li>
                                        <li><a href="header-style-2.html">Header 2</a></li>
                                        <li><a href="header-style-3.html">Header 3</a></li>
                                        <li><a href="header-style-4.html">Header 4</a></li>
                                        <li><a href="header-style-5.html">Header 5</a></li>
                                        <li><a href="header-style-6.html">Header 6</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:;">Header Dark <i class="fa fa-angle-right"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="header-style-dark-1.html">Header 1</a></li>
                                        <li><a href="header-style-dark-2.html">Header 2</a></li>
                                        <li><a href="header-style-dark-3.html">Header 3</a></li>
                                        <li><a href="header-style-dark-4.html">Header 4</a></li>
                                        <li><a href="header-style-dark-5.html">Header 5</a></li>
                                        <li><a href="header-style-dark-6.html">Header 6</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:;">Footer <i class="fa fa-angle-right"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="footer-1.html">Footer 1 </a></li>
                                        <li><a href="footer-2.html">Footer 2</a></li>
                                        <li><a href="footer-3.html">Footer 3</a></li>
                                        <li><a href="footer-4.html">Footer 4</a></li>
                                        <li><a href="footer-5.html">Footer 5</a></li>
                                        <li><a href="footer-6.html">Footer 6</a></li>
                                        <li><a href="footer-7.html">Footer 7</a></li>
                                        <li><a href="footer-8.html">Footer 8</a></li>
                                        <li><a href="footer-9.html">Footer 9</a></li>
                                        <li><a href="footer-10.html">Footer 10</a></li>
                                        <li><a href="footer-11.html">Footer 11</a></li>
                                        <li><a href="footer-12.html">Footer 12</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="has-mega-menu"> <a href="javascript:;">Pages<i class="fa fa-chevron-down"></i></a>
                            <ul class="mega-menu">
                                <li>
                                    <a href="javascript:;">Pages</a>
                                    <ul>
                                        <li><a href="about-1.html">About us 1</a></li>
                                        <li><a href="about-2.html">About us 2</a></li>
                                        <li><a href="services-1.html">Services 1</a></li>
                                        <li><a href="services-2.html">Services 2</a></li>
                                        <li><a href="faq-1.html">Faqs </a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:;">Pages</a>
                                    <ul>
                                        <li><a href="teacher.html">Teachers</a></li>
                                        <li><a href="teachers-profile.html">Teachers Profile</a></li>
                                        <li><a href="courses.html">Courses</a></li>
                                        <li><a href="courses-details.html">Courses Details</a></li>
                                        <li><a href="event.html">Events</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:;">Pages</a>
                                    <ul>
                                        <li><a href="event-details.html">Events Details</a></li>
                                        <li><a href="help-desk.html">Help Desk</a></li>
                                        <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                        <li><a href="error-404.html">Error 404</a></li>
                                        <li><a href="error-405.html">Error 405</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:;">Pages</a>
                                    <ul>
                                        <li><a href="gallery-grid-2.html">Gallery Grid 2</a></li>
                                        <li><a href="gallery-grid-3.html">Gallery Grid 3</a></li>
                                        <li><a href="gallery-grid-4.html">Gallery Grid 4</a></li>
                                        <li><a href="coming-soon-1.html">Coming Soon 1</a></li>
                                        <li><a href="coming-soon-2.html">Coming Soon 2</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;">Shop<i class="fa fa-chevron-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="shop.html">Shop</a></li>
                                <li><a href="shop-sidebar.html">Shop Sidebar</a></li>
                                <li><a href="shop-product-details.html">Product Details</a></li>
                                <li><a href="shop-cart.html">Cart</a></li>
                                <li><a href="shop-wishlist.html">Wishlist</a></li>
                                <li><a href="shop-checkout.html">Checkout</a></li>
                                <li><a href="shop-login.html">Login</a></li>
                                <li><a href="shop-register.html">Register</a></li>
                            </ul>
                        </li>
                        <li class="has-mega-menu"> <a href="javascript:;">Blog<i class="fa fa-chevron-down"></i></a>
                            <ul class="mega-menu">
                                <li> <a href="javascript:;">Blog</a>
                                    <ul>
                                        <li><a href="blog-half-img.html">Half image</a></li>
                                        <li><a href="blog-half-img-sidebar.html">Half image sidebar</a></li>
                                        <li><a href="blog-half-img-left-sidebar.html">Half image sidebar left</a></li>
                                        <li><a href="blog-large-img.html">Large image</a></li>
                                    </ul>
                                </li>
                                <li> <a href="javascript:;">Blog</a>
                                    <ul>
                                        <li><a href="blog-large-img-sidebar.html">Large image sidebar</a></li>
                                        <li><a href="blog-large-img-left-sidebar.html">Large image sidebar left</a>
                                        </li>
                                        <li><a href="blog-grid-2.html">Grid 2</a></li>
                                        <li><a href="blog-grid-2-sidebar.html">Grid 2 sidebar</a></li>
                                    </ul>
                                </li>
                                <li> <a href="javascript:;">Blog</a>
                                    <ul>
                                        <li><a href="blog-grid-2-sidebar-left.html">Grid 2 sidebar left</a></li>
                                        <li><a href="blog-grid-3.html">Grid 3</a></li>
                                        <li><a href="blog-grid-3-sidebar.html">Grid 3 sidebar</a></li>
                                        <li><a href="blog-grid-3-sidebar-left.html">Grid 3 sidebar left</a></li>
                                    </ul>
                                </li>
                                <li> <a href="javascript:;">Blog</a>
                                    <ul>
                                        <li><a href="blog-grid-4.html">Grid 4</a></li>
                                        <li><a href="blog-single.html">Single</a></li>
                                        <li><a href="blog-single-sidebar.html">Single sidebar</a></li>
                                        <li><a href="blog-single-left-sidebar.html">Single sidebar right</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="has-mega-menu"> <a href="javascript:;">Element<i
                                    class="fa fa-chevron-down"></i></a>
                            <ul class="mega-menu">
                                <li><a href="javascript:;">Element</a>
                                    <ul>
                                        <li><a href="shortcode-buttons.html"><i class="ti-mouse"></i> Buttons</a></li>
                                        <li><a href="shortcode-icon-box-styles.html"><i class="ti-layout-grid2"></i>
                                                Icon box styles</a></li>
                                        <li><a href="shortcode-pricing-table.html"><i
                                                    class="ti-layout-grid2-thumb"></i> Pricing table</a></li>
                                        <li><a href="shortcode-toggles.html"><i
                                                    class="ti-layout-accordion-separated"></i> Toggles</a></li>
                                        <li><a href="shortcode-team.html"><i class="ti-user"></i> Team</a></li>
                                        <li><a href="shortcode-animation-effects.html"><i class="ti-layers-alt"></i>
                                                Animation Effects</a></li>
                                    </ul>
                                </li>
                                <li> <a href="javascript:;">Element</a>
                                    <ul>
                                        <li><a href="shortcode-carousel-sliders.html"><i class="ti-layout-slider"></i>
                                                Carousel sliders</a></li>
                                        <li><a href="shortcode-image-box-content.html"><i class="ti-image"></i> Image
                                                box content</a></li>
                                        <li><a href="shortcode-tabs.html"><i class="ti-layout-tab-window"></i>
                                                Tabs</a></li>
                                        <li><a href="shortcode-counters.html"><i class="ti-timer"></i> Counters</a>
                                        </li>
                                        <li><a href="shortcode-shop-widgets.html"><i class="ti-shopping-cart"></i>
                                                Shop Widgets</a></li>
                                        <li><a href="shortcode-filters.html"><i class="ti-check-box"></i> Gallery
                                                Filters</a></li>
                                    </ul>
                                </li>
                                <li> <a href="javascript:;">Element</a>
                                    <ul>
                                        <li><a href="shortcode-accordians.html"><i
                                                    class="ti-layout-accordion-list"></i> Accordians</a></li>
                                        <li><a href="shortcode-dividers.html"><i class="ti-layout-list-post"></i>
                                                Dividers</a></li>
                                        <li><a href="shortcode-images-effects.html"><i
                                                    class="ti-layout-media-overlay"></i> Images effects</a></li>
                                        <li><a href="shortcode-testimonials.html"><i class="ti-comments"></i>
                                                Testimonials</a></li>
                                        <li><a href="shortcode-pagination.html"><i class="ti-more"></i> Pagination</a>
                                        </li>
                                        <li><a href="shortcode-alert-box.html"><i class="ti-alert"></i> Alert box</a>
                                        </li>
                                    </ul>
                                </li>
                                <li> <a href="javascript:;">Element</a>
                                    <ul>
                                        <li><a href="shortcode-icon-box.html"><i class="ti-layout-media-left-alt"></i>
                                                Icon Box</a></li>
                                        <li><a href="shortcode-list-group.html"><i class="ti-list"></i> List group</a>
                                        </li>
                                        <li><a href="shortcode-title-separators.html"><i
                                                    class="ti-layout-line-solid"></i> Title Separators</a></li>
                                        <li><a href="shortcode-all-widgets.html"><i class="ti-widgetized"></i>
                                                Widgets</a></li>
                                        <li><a href="shortcode-carousel-sliders.html"><i class="ti-layout-slider"></i>
                                                Carousel sliders</a></li>
                                        <li><a href="shortcode-image-box-content.html"><i class="ti-image"></i> Image
                                                box content</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;">Contact Us<i class="fa fa-chevron-down"></i></a>
                            <ul class="sub-menu right">
                                <li><a href="contact-1.html">Contact us 1</a></li>
                                <li><a href="contact-2.html">Contact us 2</a></li>
                                <li><a href="contact-3.html">Contact us 3</a></li>
                                <li><a href="contact-4.html">Contact us 4</a></li>
                            </ul>
                        </li> --}}
                    </ul>
                    <div class="dlab-social-icon">
                        <ul>
                            <li><a class="site-button sharp-sm fa fa-facebook"
                                    href="https://www.facebook.com/BPSMKelantan/" target="blank"></a></li>
                            <li><a class="site-button sharp-sm fa fa-youtube"
                                    href="https://www.youtube.com/@bahagianpengurusansumberma5455" target="blank"></a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main header END -->
</header>

@extends('layouts.pmi.apps', ['page' => 'takwim'])

@section('content')
<div class="page-content bg-gray">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url({{ asset('templatePMI/images/banner/test.jpg') }});" >
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Takwim</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="{{ url('/') }}">Halaman Utama</a></li>
                        <li>Takwim</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <div class="content-area">
        <div class="container">
            <div class="row">
                <!-- Side bar start -->
                <div class="col-lg-3 col-md-5">
                    <aside class="side-bar sticky-top">
                        <div class="widget">
                            <h5 class="widget-title style-1">Search</h5>
                            <div class="search-bx style-1">
                                <form role="search" method="post">
                                    <div class="input-group">
                                        <input name="text" class="form-control" placeholder="Enter your keywords..." type="text">
                                        <span class="input-group-btn">
                                            <button type="submit" class="fa fa-search site-button sharp radius-no"></button>
                                        </span> 
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="widget recent-posts-entry">
                            <h5 class="widget-title style-1">Recent Posts</h5>
                            <div class="widget-post-bx">
                                <div class="widget-post clearfix">
                                    <div class="dlab-post-media"> 
                                        <img src="{{ asset('templatePMI/images/blog/recent-blog/pic1.jpg') }}" width="200" height="143" alt=""> 
                                    </div>
                                    <div class="dlab-post-info">
                                        <div class="dlab-post-meta">
                                            <ul>
                                                <li class="post-date"> <i class="la la-clock"></i> <strong>01 June</strong> <span> 2020</span> </li>
                                            </ul>
                                        </div>
                                        <div class="dlab-post-header">
                                            <h6 class="post-title"><a href="blog-single-left-sidebar.html">Why is Early Education Essential?</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-post clearfix">
                                    <div class="dlab-post-media"> 
                                        <img src="{{ asset('templatePMI/images/blog/recent-blog/pic2.jpg') }}" width="200" height="160" alt=""> 
                                    </div>
                                    <div class="dlab-post-info">
                                        <div class="dlab-post-meta">
                                            <ul>
                                                <li class="post-date"> <i class="la la-clock"></i> <strong>01 June</strong> <span> 2020</span> </li>
                                            </ul>
                                        </div>
                                        <div class="dlab-post-header">
                                            <h6 class="post-title"><a href="blog-single-left-sidebar.html">Here's What People Are Saying About</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-post clearfix">
                                    <div class="dlab-post-media"> 
                                        <img src="{{ asset('templatePMI/images/blog/recent-blog/pic3.jpg') }}" width="200" height="160" alt=""> 
                                    </div>
                                    <div class="dlab-post-info">
                                        <div class="dlab-post-meta">
                                            <ul>
                                                <li class="post-date"> <i class="la la-clock"></i> <strong>01 June</strong> <span> 2020</span> </li>
                                            </ul>
                                        </div>
                                        <div class="dlab-post-header">
                                            <h6 class="post-title"><a href="blog-single-left-sidebar.html">Five Things Nobody Told You About</a></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget widget_gallery gallery-grid-4">
                            <h5 class="widget-title style-1">Our Gallery</h5>
                            <ul id="lightgallery" class="lightgallery">
                                <li>
                                    <div class="dlab-post-thum dlab-img-effect">
                                        <span data-exthumbimage="images/gallery/pic1.jpg') }}" data-src="{{ asset('templatePMI/images/gallery/pic1.jpg') }}" class="check-km" title="Image 1 Title will come here">		
                                            <img src="{{ asset('templatePMI/images/gallery/pic1.jpg') }}" alt=""> 
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="dlab-post-thum dlab-img-effect">
                                        <span data-exthumbimage="images/gallery/pic2.jpg') }}" data-src="{{ asset('templatePMI/images/gallery/pic2.jpg') }}" class="check-km" title="Image 2 Title will come here">		
                                            <img src="{{ asset('templatePMI/images/gallery/pic2.jpg') }}" alt=""> 
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="dlab-post-thum dlab-img-effect">
                                        <span data-exthumbimage="images/gallery/pic3.jpg') }}" data-src="{{ asset('templatePMI/images/gallery/pic3.jpg') }}" class="check-km" title="Image 3 Title will come here">		
                                            <img src="{{ asset('templatePMI/images/gallery/pic3.jpg') }}" alt=""> 
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="dlab-post-thum dlab-img-effect">
                                        <span data-exthumbimage="images/gallery/pic4.jpg') }}" data-src="{{ asset('templatePMI/images/gallery/pic4.jpg') }}" class="check-km" title="Image 4 Title will come here">		
                                            <img src="{{ asset('templatePMI/images/gallery/pic4.jpg') }}" alt=""> 
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="dlab-post-thum dlab-img-effect">
                                        <span data-exthumbimage="images/gallery/pic5.jpg') }}" data-src="{{ asset('templatePMI/images/gallery/pic5.jpg') }}" class="check-km" title="Image 5 Title will come here">		
                                            <img src="{{ asset('templatePMI/images/gallery/pic5.jpg') }}" alt=""> 
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="dlab-post-thum dlab-img-effect">
                                        <span data-exthumbimage="images/gallery/pic6.jpg') }}" data-src="{{ asset('templatePMI/images/gallery/pic6.jpg') }}" class="check-km" title="Image 6 Title will come here">		
                                            <img src="{{ asset('templatePMI/images/gallery/pic6.jpg') }}" alt=""> 
                                        </span>
                                    </div>
                                </li>
                                 <li>
                                    <div class="dlab-post-thum dlab-img-effect">
                                        <span data-exthumbimage="images/gallery/pic7.jpg') }}" data-src="{{ asset('templatePMI/images/gallery/pic7.jpg') }}" class="check-km" title="Image 7 Title will come here">		
                                            <img src="{{ asset('templatePMI/images/gallery/pic7.jpg') }}" alt=""> 
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="dlab-post-thum dlab-img-effect">
                                        <span data-exthumbimage="images/gallery/pic8.jpg') }}" data-src="{{ asset('templatePMI/images/gallery/pic8.jpg') }}" class="check-km" title="Image 8 Title will come here">		
                                            <img src="{{ asset('templatePMI/images/gallery/pic8.jpg') }}" alt=""> 
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="widget widget_archive">
                            <h5 class="widget-title style-1">Categories List</h5>
                            <ul>
                                <li><a href="javascript:void(0);">Lifestyle</a></li>
                                <li><a href="javascript:void(0);">Creative</a></li>
                                <li><a href="javascript:void(0);">Education</a></li>
                                <li><a href="javascript:void(0);">Events</a></li>
                                <li><a href="javascript:void(0);">Sports</a></li>
                            </ul>
                        </div>
                        <div class="widget widget_tag_cloud radius">
                            <h5 class="widget-title style-1">Tags</h5>
                            <div class="tagcloud"> 
                                <a href="javascript:void(0);">Design</a> 
                                <a href="javascript:void(0);">User interface</a> 
                                <a href="javascript:void(0);">SEO</a> 
                                <a href="javascript:void(0);">WordPress</a> 
                                <a href="javascript:void(0);">Development</a> 
                                <a href="javascript:void(0);">Joomla</a> 
                                <a href="javascript:void(0);">Design</a> 
                                <a href="javascript:void(0);">User interface</a> 
                                <a href="javascript:void(0);">SEO</a> 
                                <a href="javascript:void(0);">WordPress</a> 
                                <a href="javascript:void(0);">Development</a> 
                                <a href="javascript:void(0);">Joomla</a> 
                                <a href="javascript:void(0);">Design</a> 
                                <a href="javascript:void(0);">User interface</a> 
                                <a href="javascript:void(0);">SEO</a> 
                                <a href="javascript:void(0);">WordPress</a> 
                                <a href="javascript:void(0);">Development</a> 
                                <a href="javascript:void(0);">Joomla</a> 
                            </div>
                        </div>
                    </aside>
                </div>
                <!-- Side bar END -->
                <!-- left part start -->
                <div class="col-lg-9 col-md-7">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="dlab-box courses-bx">
                                <div class="dlab-media"> 
                                    <img src="{{ asset('templatePMI/images/our-services/pic1.jpg') }}" alt="">
                                    <div class="user-info">
                                        <img src="{{ asset('templatePMI/images/testimonials/pic1.jpg') }}" alt="">
                                        <h6 class="title">Jack Ronan</h6>
                                        <div class="review">
                                            <ul class="item-review">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <span>10 Review</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dlab-info">
                                    <h6 class="dlab-title"><a href="courses-details.html">Learn Python – Interactive Python Tutorial</a></h6>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                    <div class="courses-info">
                                        <ul>
                                            <li><i class="fa fa-users"></i> 20 Student </li>
                                        </ul>
                                        <span class="price">$79.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="dlab-box courses-bx">
                                <div class="dlab-media"> 
                                    <img src="{{ asset('templatePMI/images/our-services/pic2.jpg') }}" alt="">
                                    <div class="user-info">
                                        <img src="{{ asset('templatePMI/images/testimonials/pic1.jpg') }}" alt="">
                                        <h6 class="title">Jack Ronan</h6>
                                        <div class="review">
                                            <ul class="item-review">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <span>10 Review</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dlab-info">
                                    <h6 class="dlab-title"><a href="courses-details.html">Learn Python – Interactive Python Tutorial</a></h6>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                    <div class="courses-info">
                                        <ul>
                                            <li><i class="fa fa-users"></i> 20 Student </li>
                                        </ul>
                                        <span class="price">$79.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="dlab-box courses-bx">
                                <div class="dlab-media"> 
                                    <img src="{{ asset('templatePMI/images/our-services/pic3.jpg') }}" alt="">
                                    <div class="user-info">
                                        <img src="{{ asset('templatePMI/images/testimonials/pic1.jpg') }}" alt="">
                                        <h6 class="title">Jack Ronan</h6>
                                        <div class="review">
                                            <ul class="item-review">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <span>10 Review</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dlab-info">
                                    <h6 class="dlab-title"><a href="courses-details.html">Learn Python – Interactive Python Tutorial</a></h6>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                    <div class="courses-info">
                                        <ul>
                                            <li><i class="fa fa-users"></i> 20 Student </li>
                                        </ul>
                                        <span class="price">$79.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="dlab-box courses-bx">
                                <div class="dlab-media"> 
                                    <img src="{{ asset('templatePMI/images/our-services/pic4.jpg') }}" alt="">
                                    <div class="user-info">
                                        <img src="{{ asset('templatePMI/images/testimonials/pic1.jpg') }}" alt="">
                                        <h6 class="title">Jack Ronan</h6>
                                        <div class="review">
                                            <ul class="item-review">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <span>10 Review</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dlab-info">
                                    <h6 class="dlab-title"><a href="courses-details.html">Learn Python – Interactive Python Tutorial</a></h6>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                    <div class="courses-info">
                                        <ul>
                                            <li><i class="fa fa-users"></i> 20 Student </li>
                                        </ul>
                                        <span class="price">$79.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="dlab-box courses-bx">
                                <div class="dlab-media"> 
                                    <img src="{{ asset('templatePMI/images/our-services/pic1.jpg') }}" alt="">
                                    <div class="user-info">
                                        <img src="{{ asset('templatePMI/images/testimonials/pic1.jpg') }}" alt="">
                                        <h6 class="title">Jack Ronan</h6>
                                        <div class="review">
                                            <ul class="item-review">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <span>10 Review</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dlab-info">
                                    <h6 class="dlab-title"><a href="courses-details.html">Learn Python – Interactive Python Tutorial</a></h6>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                    <div class="courses-info">
                                        <ul>
                                            <li><i class="fa fa-users"></i> 20 Student </li>
                                        </ul>
                                        <span class="price">$79.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="dlab-box courses-bx">
                                <div class="dlab-media"> 
                                    <img src="{{ asset('templatePMI/images/our-services/pic2.jpg') }}" alt="">
                                    <div class="user-info">
                                        <img src="{{ asset('templatePMI/images/testimonials/pic1.jpg') }}" alt="">
                                        <h6 class="title">Jack Ronan</h6>
                                        <div class="review">
                                            <ul class="item-review">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <span>10 Review</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dlab-info">
                                    <h6 class="dlab-title"><a href="courses-details.html">Learn Python – Interactive Python Tutorial</a></h6>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                    <div class="courses-info">
                                        <ul>
                                            <li><i class="fa fa-users"></i> 20 Student </li>
                                        </ul>
                                        <span class="price">$79.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="dlab-box courses-bx">
                                <div class="dlab-media"> 
                                    <img src="{{ asset('templatePMI/images/our-services/pic3.jpg') }}" alt="">
                                    <div class="user-info">
                                        <img src="{{ asset('templatePMI/images/testimonials/pic1.jpg') }}" alt="">
                                        <h6 class="title">Jack Ronan</h6>
                                        <div class="review">
                                            <ul class="item-review">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <span>10 Review</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dlab-info">
                                    <h6 class="dlab-title"><a href="courses-details.html">Learn Python – Interactive Python Tutorial</a></h6>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                    <div class="courses-info">
                                        <ul>
                                            <li><i class="fa fa-users"></i> 20 Student </li>
                                        </ul>
                                        <span class="price">$79.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="dlab-box courses-bx">
                                <div class="dlab-media"> 
                                    <img src="{{ asset('templatePMI/images/our-services/pic4.jpg') }}" alt="">
                                    <div class="user-info">
                                        <img src="{{ asset('templatePMI/images/testimonials/pic1.jpg') }}" alt="">
                                        <h6 class="title">Jack Ronan</h6>
                                        <div class="review">
                                            <ul class="item-review">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <span>10 Review</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dlab-info">
                                    <h6 class="dlab-title"><a href="courses-details.html">Learn Python – Interactive Python Tutorial</a></h6>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                    <div class="courses-info">
                                        <ul>
                                            <li><i class="fa fa-users"></i> 20 Student </li>
                                        </ul>
                                        <span class="price">$79.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="dlab-box courses-bx">
                                <div class="dlab-media"> 
                                    <img src="{{ asset('templatePMI/images/our-services/pic1.jpg') }}" alt="">
                                    <div class="user-info">
                                        <img src="{{ asset('templatePMI/images/testimonials/pic1.jpg') }}" alt="">
                                        <h6 class="title">Jack Ronan</h6>
                                        <div class="review">
                                            <ul class="item-review">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <span>10 Review</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dlab-info">
                                    <h6 class="dlab-title"><a href="courses-details.html">Learn Python – Interactive Python Tutorial</a></h6>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                    <div class="courses-info">
                                        <ul>
                                            <li><i class="fa fa-users"></i> 20 Student </li>
                                        </ul>
                                        <span class="price">$79.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pagination start -->
                        <div class="pagination-bx rounded-sm primary clearfix m-b30 text-center col-md-12">
                            <ul class="pagination">
                                <li class="previous"><a href="javascript:void(0);"><i class="ti-arrow-left"></i> Prev</a></li>
                                <li class="active"><a href="javascript:void(0);">1</a></li>
                                <li><a href="javascript:void(0);">2</a></li>
                                <li><a href="javascript:void(0);">3</a></li>
                                <li class="next"><a href="javascript:void(0);">Next <i class="ti-arrow-right"></i></a></li>
                            </ul>
                        </div>
                        <!-- Pagination END -->
                    </div>
                </div>
                <!-- left part start -->
            </div>
        </div>
    </div>
</div>
@endsection
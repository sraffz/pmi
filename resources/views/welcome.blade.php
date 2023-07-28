@extends('layouts.pmi2.apps', ['page' => 'Halaman Utama'])

@section('content')
    <div class="page-content bg-white">
        <!-- inner page banner -->
        {{-- <div class="dlab-bnr-inr overlay-black-middle bg-pt course-banner"
            style="background-image:url({{ asset('templatePMI/images/banner/test.jpg') }});">
            <div class="container">
                <div class="dlab-bnr-inr-entry text-white">
                    <h1 class="title">Sistem Pembangunan Modal Insan</h1>
                    <form class="banner-form"  action="{{ url('/carian-kursus') }}" method="POST">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group">
                                        @csrf
                                        <input type="text" name="carian" class="form-control" autocomplete="off" placeholder="Carian">
                                        <div class="input-group-append">
                                            <button class="site-button btnhover17 btn-block" type="submit"><i class="fa fa-search"></i> Cari</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="m-t20">
                        <h5>Terus menuntut ilmu baharu untuk perkembangan ideas dan perspektif yang baharu</h5>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="banner-langschool">
            <div class="dlab-bnr-inr banner-content"
                style="background-image:url({{ asset('templatePMI/images/banner/suk-mbna.jpg') }});">
                <div class="container">
                    <div class="dlab-bnr-inr-entry">
                        <div class="row">
                            <div class="col-sm-6 col-2"></div>
                            <div class="col-sm-6 col-10">
                                <div class="dlab-bnr-inr-entry text-left">
                                    <h4 class="text-primary">Sistem</h4>
                                    <h1>Pembangunan Modal Insan</h1>
                                    {{-- <div class="input-group search-coures">
                                        <div>
                                            <select>
                                                <option>All Category</option>
                                                <option>Mathematics</option>
                                                <option>English</option>
                                                <option>Science</option>
                                            </select>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="site-button btnhover17">Cari</button>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->
        <div class="content-block">
            <!-- Content Section -->
            <div class="section-full content-inner bg-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="section-head head-langschool m-b20">
                                {{-- <h5 class="text-primary">Start Now!</h5> --}}
                                <h2 class="title">BPSM</h2>
                                <p>Bagi mempelbagaikan kaedah penyampaian perkhidmatan kepada pelanggan, BPSM telah
                                    menyediakan kemudahan di mana penjawat awam Negeri Kelantan boleh memohon kursus secara
                                    dalam talian.
                                    Kemudahan ini bukan saja dapat memudahkan proses permohonan kursus tetapi juga telah
                                    menggalakkan lebih ramai lagi penjawat awam Negeri Kelantan untuk mengikuti kursus.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="icon-bx-wraper left iconbox-lang">
                                        <div class="icon-bx-xs bg-primary radius"> <span class="icon-cell">1</span> </div>
                                        <div class="icon-content">
                                            <h5 class="dlab-tilte m-b0">Mesra Pengguna</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="icon-bx-wraper left iconbox-lang">
                                        <div class="icon-bx-xs bg-primary radius"> <span class="icon-cell">2</span> </div>
                                        <div class="icon-content">
                                            <h5 class="dlab-tilte m-b0">Ketepatan Data</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="icon-bx-wraper left iconbox-lang">
                                        <div class="icon-bx-xs bg-primary radius"> <span class="icon-cell">3</span> </div>
                                        <div class="icon-content">
                                            <h5 class="dlab-tilte m-b0">Kursus Berpusat</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="icon-bx-wraper left iconbox-lang">
                                        <div class="icon-bx-xs bg-primary radius"> <span class="icon-cell">4</span> </div>
                                        <div class="icon-content">
                                            <h5 class="dlab-tilte m-b0">Semak Sejarah Permohonan</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="section-full content-inner bg-gray">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6 col-6 m-b30">
                        <div class="icon-bx-wraper left counter-style-6">
                            <div class="icon-lg text-primary radius icon-up">
                                <span class="icon-cell"><i class="las la-laptop-code"></i></span>
                            </div>
                            <div class="icon-content">
                                <h5 class="dlab-tilte">8000</h5>
                                <p>Online Courses</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6 m-b30">
                        <div class="icon-bx-wraper left counter-style-6">
                            <div class="icon-lg text-primary radius icon-up">
                                <span class="icon-cell"><i class="las la-user-graduate"></i></span>
                            </div>
                            <div class="icon-content">
                                <h5 class="dlab-tilte">2700</h5>
                                <p>Expert Instructors</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6 m-b30">
                        <div class="icon-bx-wraper left counter-style-6">
                            <div class="icon-lg text-primary radius icon-up">
                                <span class="icon-cell"><i class="las la-book"></i></span>
                            </div>
                            <div class="icon-content">
                                <h5 class="dlab-tilte">Unlimited</h5>
                                <p>Course Access</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6 m-b30">
                        <div class="icon-bx-wraper left counter-style-6">
                            <div class="icon-lg text-primary radius icon-up">
                                <span class="icon-cell"><i class="las la-book-reader"></i></span>
                            </div>
                            <div class="icon-content">
                                <h5 class="dlab-tilte">Learn</h5>
                                <p>From Anywhere</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
            <!-- Courses Category -->
            {{-- <div class="section-full bg-white content-inner">
            <div class="container">
                <div class="section-head text-center ">
                    <h2 class="title">Expand Your Knowledge & Acheive Your Goal</h2>
                    <p>There are many variations of passages of Lorem Ipsum typesetting industry has been the
                        industry's standard dummy text ever since the been when an unknown printer.</p>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 m-b30 wow fadeInUp" data-wow-duration="2s"
                        data-wow-delay="0.3s">
                        <a href="javascript:void(0);" class="category-box dlab-box">
                            <div class="dlab-media dlab-img-effect zoom">
                                <img src="{{ asset('templatePMI/images/gallery/pic1.jpg') }}" alt="">
                            </div>
                            <div class="icon-content">
                                <h2 class="dlab-tilte">Web Developer</h2>
                                <p>+18 Courses</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 m-b30 wow fadeInUp" data-wow-duration="2s"
                        data-wow-delay="0.9s">
                        <a href="javascript:void(0);" class="category-box dlab-box">
                            <div class="dlab-media dlab-img-effect zoom">
                                <img src="{{ asset('templatePMI/images/gallery/pic2.jpg') }}" alt="">
                            </div>
                            <div class="icon-content">
                                <h2 class="dlab-tilte">Photography</h2>
                                <p>+23 Courses</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 m-b30 wow fadeInUp" data-wow-duration="2s"
                        data-wow-delay="1.2s">
                        <a href="javascript:void(0);" class="category-box dlab-box">
                            <div class="dlab-media dlab-img-effect zoom">
                                <img src="{{ asset('templatePMI/images/gallery/pic3.jpg') }}" alt="">
                            </div>
                            <div class="icon-content">
                                <h2 class="dlab-tilte">business study</h2>
                                <p>+10 Courses</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 m-b30 wow fadeInUp" data-wow-duration="2s"
                        data-wow-delay="1.5s">
                        <a href="javascript:void(0);" class="category-box dlab-box">
                            <div class="dlab-media dlab-img-effect zoom">
                                <img src="{{ asset('templatePMI/images/gallery/pic4.jpg') }}" alt="">
                            </div>
                            <div class="icon-content">
                                <h2 class="dlab-tilte">Health & fitness</h2>
                                <p>+18 Courses</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 m-b30 wow fadeInUp" data-wow-duration="2s"
                        data-wow-delay="1.8s">
                        <a href="javascript:void(0);" class="category-box dlab-box">
                            <div class="dlab-media dlab-img-effect zoom">
                                <img src="{{ asset('templatePMI/images/gallery/pic5.jpg') }}" alt="">
                            </div>
                            <div class="icon-content">
                                <h2 class="dlab-tilte">Mathematics</h2>
                                <p>+15 Courses</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6 m-b30 wow fadeInUp" data-wow-duration="2s"
                        data-wow-delay="2.1s">
                        <a href="javascript:void(0);" class="category-box dlab-box">
                            <div class="dlab-media dlab-img-effect zoom">
                                <img src="{{ asset('templatePMI/images/gallery/pic6.jpg') }}" alt="">
                            </div>
                            <div class="icon-content">
                                <h2 class="dlab-tilte">marketing</h2>
                                <p>+10 Courses</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}
            <!-- Courses Category End -->
            <!-- Call To Action -->
            {{-- <div class="section-full call-action style1 bg-primary wow fadeIn" data-wow-duration="2s"
            data-wow-delay="0.2s">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <h2 class="title text-white">Amazing things happen to your business </h2>
                    </div>
                    <div class="col-lg-3 d-flex">
                        <a href="contact-1.html"
                            class="site-button white outline align-self-center ml-auto btnhover14">Contact
                            Us</a>
                    </div>
                </div>
            </div>
        </div> --}}
            <!-- Call To Action End -->
            <!-- Courses -->
            <div class="section-full content-inner bg-dark wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s">
                <div class="container">
                    <div class="section-head text-black text-center">
                        <h2 class="text-primary">Senarai Kursus</h2>
                        {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the
                            industry's standard dummy text ever since the been when an unknown printer.</p> --}}
                    </div>
                    <div class="site-filters clearfix center m-b40">
                        <ul class="filters" data-toggle="buttons">
                            <li data-filter="" class="btn active"><input type="radio"><a href="javascript:void(0);"
                                    class="site-button btnhover17 outline outline-2 button-sm"><span>Semua</span></a>
                            </li>
                            @foreach ($jenis_program as $jeniss)
                                <li data-filter="{{ $jeniss->jenis_program }}" class="btn"><input type="radio">
                                    <a href="javascript:void(0);"
                                        class="site-button btnhover17 outline outline-2 button-sm"><span>{{ $jeniss->jenis_program }}</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="clearfix" id="lightgallery">
                        <ul id="masonry" class="portfolio-ic dlab-gallery-listing row gallery-grid-4 lightgallery">
                            @php
                                $i = 1;
                            @endphp
                            @forelse ($senaraiProgram as $program)
                                <li class="card-container col-lg-3 col-md-6 col-sm-6 {{ $program->jenis_program }}">
                                    <div class="dlab-box courses-bx" style="min-height: 650px;">
                                        <div class="dlab-media">
                                            <img src="{{ asset('storage/lampiran/' . $program->poster_program) }}"
                                                alt="">
                                        </div>
                                        <div class="dlab-info">
                                            <h6 class="dlab-title">
                                                <a href="{{ route('butiran.kursus') }}"
                                                    onclick="event.preventDefault(); document.getElementById('butiran-kursus_{{ $i }}').submit();"><span
                                                        style="text-transform: uppercase">{{ $program->nama_program }}</span></a>
                                            </h6>
                                            <form id="butiran-kursus_{{ $i }}"
                                                action="{{ url('butiran-kursus') }}" method="POST" style="display: none;">
                                                @csrf
                                                <input type="hidden" id="id_program" name="id_program"
                                                    value="{{ $program->id_program }}">
                                            </form>
                                            {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p> --}}
                                            <div class="courses-info">
                                                <p>
                                                    <i class="ti-calendar text-success m-r5"></i> <span
                                                        style="color: black; font-weight: bold">Tarikh </span> <br>
                                                    {{ \Carbon\Carbon::parse($program->tarikh_mula)->format('d/m/Y') }} -
                                                    {{ \Carbon\Carbon::parse($program->tarikh_akhir)->format('d/m/Y') }}<br>
                                                    <i class="ti-location-pin text-danger m-r5 mt-2"></i> <span
                                                        style="color: black;; font-weight: bold">Tempat</span> <br>
                                                    {{ $program->tempatProgram->nama_tempat }} <br>
                                                    <br>
                                                    <i class="ti-ink-pen text-primary m-r5"></i><span
                                                        style="color: black;; font-weight: bold"> Anjuran </span> <br>
                                                    {{ $program->anjuran }}
                                                </p>

                                            </div>
                                            <div class="courses-info">
                                                <ul>
                                                    {{-- <li><i class="fa fa-users"></i> 20 Student </li> --}}
                                                </ul>
                                                <a href="{{ route('login') }}"><span class="price">DAFTAR</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @php
                                    $i++;
                                @endphp
                            @empty
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="service-box">
                                        <!-- Service Title -->
                                        <h3 style="font-size: 1.5rem">Tiada Program Dibuka</h3>
                                    </div>
                                </div>
                            @endforelse
                            {{-- <li class="card-container col-lg-3 col-md-6 col-sm-6 photography">
                            <div class="dlab-box courses-bx">
                                <div class="dlab-media">
                                    <img src="{{ asset('templatePMI/images/our-work/pic2.jpg') }}"
                                        alt="">
                                    <div class="user-info">
                                        <img src="{{ asset('templatePMI/images/testimonials/pic2.jpg') }}"
                                            alt="">
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
                                    <h6 class="dlab-title"><a href="courses-details.html">Learn Python –
                                            Interactive Python Tutorial</a></h6>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                    <div class="courses-info">
                                        <ul>
                                            <li><i class="fa fa-users"></i> 20 Student </li>
                                        </ul>
                                        <span class="price">$79.00</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="card-container col-lg-3 col-md-6 col-sm-6 management">
                            <div class="dlab-box courses-bx">
                                <div class="dlab-media">
                                    <img src="{{ asset('templatePMI/images/our-work/pic3.jpg') }}"
                                        alt="">
                                    <div class="user-info">
                                        <img src="{{ asset('templatePMI/images/testimonials/pic3.jpg') }}"
                                            alt="">
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
                                    <h6 class="dlab-title"><a href="courses-details.html">Learn Python –
                                            Interactive Python Tutorial</a></h6>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                    <div class="courses-info">
                                        <ul>
                                            <li><i class="fa fa-users"></i> 20 Student </li>
                                        </ul>
                                        <span class="price">$79.00</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="card-container col-lg-3 col-md-6 col-sm-6 advertising">
                            <div class="dlab-box courses-bx">
                                <div class="dlab-media">
                                    <img src="{{ asset('templatePMI/images/our-work/pic4.jpg') }}"
                                        alt="">
                                    <div class="user-info">
                                        <img src="{{ asset('templatePMI/images/testimonials/pic2.jpg') }}"
                                            alt="">
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
                                    <h6 class="dlab-title"><a href="courses-details.html">Learn Python –
                                            Interactive Python Tutorial</a></h6>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                    <div class="courses-info">
                                        <ul>
                                            <li><i class="fa fa-users"></i> 20 Student </li>
                                        </ul>
                                        <span class="price">$79.00</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="card-container col-lg-3 col-md-6 col-sm-6 collage">
                            <div class="dlab-box courses-bx">
                                <div class="dlab-media">
                                    <img src="{{ asset('templatePMI/images/our-work/pic5.jpg') }}"
                                        alt="">
                                    <div class="user-info">
                                        <img src="{{ asset('templatePMI/images/testimonials/pic1.jpg') }}"
                                            alt="">
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
                                    <h6 class="dlab-title"><a href="courses-details.html">Learn Python –
                                            Interactive Python Tutorial</a></h6>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                    <div class="courses-info">
                                        <ul>
                                            <li><i class="fa fa-users"></i> 20 Student </li>
                                        </ul>
                                        <span class="price">$79.00</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="card-container col-lg-3 col-md-6 col-sm-6 web">
                            <div class="dlab-box courses-bx">
                                <div class="dlab-media">
                                    <img src="{{ asset('templatePMI/images/our-work/pic6.jpg') }}"
                                        alt="">
                                    <div class="user-info">
                                        <img src="{{ asset('templatePMI/images/testimonials/pic3.jpg') }}"
                                            alt="">
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
                                    <h6 class="dlab-title"><a href="courses-details.html">Learn Python –
                                            Interactive Python Tutorial</a></h6>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                    <div class="courses-info">
                                        <ul>
                                            <li><i class="fa fa-users"></i> 20 Student </li>
                                        </ul>
                                        <span class="price">$79.00</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="card-container col-lg-3 col-md-6 col-sm-6 photography">
                            <div class="dlab-box courses-bx">
                                <div class="dlab-media">
                                    <img src="{{ asset('templatePMI/images/our-work/pic7.jpg') }}"
                                        alt="">
                                    <div class="user-info">
                                        <img src="{{ asset('templatePMI/images/testimonials/pic2.jpg') }}"
                                            alt="">
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
                                    <h6 class="dlab-title"><a href="courses-details.html">Learn Python –
                                            Interactive Python Tutorial</a></h6>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                    <div class="courses-info">
                                        <ul>
                                            <li><i class="fa fa-users"></i> 20 Student </li>
                                        </ul>
                                        <span class="price">$79.00</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="card-container col-lg-3 col-md-6 col-sm-6 management">
                            <div class="dlab-box courses-bx">
                                <div class="dlab-media">
                                    <img src="{{ asset('templatePMI/images/our-work/pic2.jpg') }}"
                                        alt="">
                                    <div class="user-info">
                                        <img src="{{ asset('templatePMI/images/testimonials/pic2.jpg') }}"
                                            alt="">
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
                                    <h6 class="dlab-title"><a href="courses-details.html">Learn Python –
                                            Interactive Python Tutorial</a></h6>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                    <div class="courses-info">
                                        <ul>
                                            <li><i class="fa fa-users"></i> 20 Student </li>
                                        </ul>
                                        <span class="price">$79.00</span>
                                    </div>
                                </div>
                            </div>
                        </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="section-full bg-gray content-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sort-title clearfix text-center">
                                <h4>Gambar Program Telah Dianjurkan</h4>
                            </div>
                            <!-- Image Carousel with content -->
                            <div class="section-content box-sort-in m-b30 button-example">
                                <div
                                    class="img-carousel-dots-nav owl-btn-3 owl-loaded owl-theme owl-carousel owl-btn-center-lr">

                                    @forelse ($senaraiGambar as $gambar)
                                        <div class="item">
                                            <div class="ow-carousel-entry" style="min-height: 250px">
                                                <div class="ow-entry-media dlab-img-effect zoom-slow">
                                                    <a href="javascript:void(0);"><img
                                                            src="{{ asset('storage/lampiran/' . $gambar->lokasi) }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="ow-entry-content">
                                                    <div class="ow-entry-title"><a
                                                            href="javascript:void(0);">{{ $gambar->program->nama_program }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12 col-lg-4 work-box">
                                            <div class="photobox photobox_type10">
                                                <div class="photobox__previewbox">
                                                    Tiada Gambar
                                                </div>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Image Carousel with content END -->
            </div>
            <!-- Courses End -->
            <!-- Testimonials -->
            {{-- <div class="section-full content-inner bg-gray bg-img-fix">
            <div class="container">
                <div class="section-head text-center ">
                    <h2 class="title">Our Awesome Pricing Plans For You</h2>
                    <p>There are many variations of passages of Lorem Ipsum typesetting industry has been the
                        industry's standard dummy text ever since the been when an unknown printer.</p>
                </div>
                <div class="section-content box-sort-in button-example">
                    <div class="pricingtable-row m-b30 p-lr15 no-col-gap">
                        <div class="row">
                            <div class="col-sm-6 col-md-3 col-lg-3">
                                <div class="pricingtable-wrapper">
                                    <div class="pricingtable-inner">
                                        <div class="pricingtable-price"> <span
                                                class="pricingtable-bx">$10</span> <span
                                                class="pricingtable-type">Month</span> </div>
                                        <div class="pricingtable-title bg-primary">
                                            <h4>Basic</h4>
                                        </div>
                                        <ul class="pricingtable-features">
                                            <li><i class="fa fa-check"></i> Full Responsive </li>
                                            <li><i class="fa fa-check"></i> Multi color theme</li>
                                            <li><i class="fa fa-check"></i> With Bootstrap</li>
                                            <li><i class="fa fa-check"></i> Easy to customize</li>
                                            <li><i class="fa fa-check"></i> Many Sortcodes</li>
                                        </ul>
                                        <div class="pricingtable-footer"> <a href="javascript:void(0);"
                                                class="site-button ">Sign Up</a> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 col-lg-3">
                                <div class="pricingtable-wrapper">
                                    <div class="pricingtable-inner pricingtable-highlight">
                                        <div class="pricingtable-price"> <span
                                                class="pricingtable-bx">$12</span> <span
                                                class="pricingtable-type">Month</span> </div>
                                        <div class="pricingtable-title bg-primary">
                                            <h4>Standard</h4>
                                        </div>
                                        <ul class="pricingtable-features">
                                            <li><i class="fa fa-check"></i> Full Responsive </li>
                                            <li><i class="fa fa-check"></i> Multi color theme</li>
                                            <li><i class="fa fa-check"></i> With Bootstrap</li>
                                            <li><i class="fa fa-check"></i> Easy to customize</li>
                                            <li><i class="fa fa-check"></i> Many Sortcodes</li>
                                        </ul>
                                        <div class="pricingtable-footer"> <a href="javascript:void(0);"
                                                class="site-button ">Sign Up</a> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 col-lg-3">
                                <div class="pricingtable-wrapper">
                                    <div class="pricingtable-inner">
                                        <div class="pricingtable-price"> <span
                                                class="pricingtable-bx">$18</span> <span
                                                class="pricingtable-type">Month</span> </div>
                                        <div class="pricingtable-title bg-primary">
                                            <h4>Platinum</h4>
                                        </div>
                                        <ul class="pricingtable-features">
                                            <li><i class="fa fa-check"></i> Full Responsive </li>
                                            <li><i class="fa fa-check"></i> Multi color theme</li>
                                            <li><i class="fa fa-check"></i> With Bootstrap</li>
                                            <li><i class="fa fa-check"></i> Easy to customize</li>
                                            <li><i class="fa fa-check"></i> Many Sortcodes</li>
                                        </ul>
                                        <div class="pricingtable-footer"> <a href="javascript:void(0);"
                                                class="site-button ">Sign Up</a> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 col-lg-3">
                                <div class="pricingtable-wrapper">
                                    <div class="pricingtable-inner">
                                        <div class="pricingtable-price"> <span
                                                class="pricingtable-bx">$23</span> <span
                                                class="pricingtable-type">Month</span> </div>
                                        <div class="pricingtable-title bg-primary">
                                            <h4>Gold</h4>
                                        </div>
                                        <ul class="pricingtable-features">
                                            <li><i class="fa fa-check"></i> Full Responsive </li>
                                            <li><i class="fa fa-check"></i> Multi color theme</li>
                                            <li><i class="fa fa-check"></i> With Bootstrap</li>
                                            <li><i class="fa fa-check"></i> Easy to customize</li>
                                            <li><i class="fa fa-check"></i> Many Sortcodes</li>
                                        </ul>
                                        <div class="pricingtable-footer"> <a href="javascript:void(0);"
                                                class="site-button ">Sign Up</a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
            <!-- Testimonials End -->
            <!-- Latest blog -->
            {{-- <div class="section-full content-inner bg-gray">
            <div class="container">
                <div class="section-head text-center">
                    <h2 class="title">Upcoming Events</h2>
                    <p>There are many variations of passages of Lorem Ipsum typesetting industry has been the
                        industry's standard dummy text ever since the been when an unknown printer.</p>
                </div>
                <div class="row">
                    <div class="col-lg-12 m-b30">
                        <div class="event-post event-list">
                            <div class="event-date">
                                <strong>09 </strong>
                                <span>June </span>
                            </div>
                            <div class="dlab-post-info">
                                <div class="dlab-post-meta">
                                    <ul>
                                        <li class="post-author"> <i class="la la-clock"></i> 05:00 PM </li>
                                        <li class="post-tag"> <i class="ti-location-pin"></i> Marmora Road
                                        </li>
                                    </ul>
                                </div>
                                <div class="dlab-post-title">
                                    <h4 class="post-title"><a href="event-details.html">Things You Most Likely
                                            Didn't Know About</a></h4>
                                </div>
                                <div class="post-content">
                                    <p>There are many variations of passages of Lorem Ipsum typesetting industry
                                        has been the industry's standard dummy text ever since.</p>
                                </div>
                            </div>
                            <div class="dlab-post-media">
                                <a href="event-details.html"><img
                                        src="{{ asset('templatePMI/images/events/list/pic1.jpg') }}"
                                        alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 m-b30">
                        <div class="event-post event-list">
                            <div class="event-date">
                                <strong>08 </strong>
                                <span>June </span>
                            </div>
                            <div class="dlab-post-info">
                                <div class="dlab-post-meta">
                                    <ul>
                                        <li class="post-author"> <i class="la la-clock"></i> 05:00 PM </li>
                                        <li class="post-tag"> <i class="ti-location-pin"></i> Marmora Road
                                        </li>
                                    </ul>
                                </div>
                                <div class="dlab-post-title">
                                    <h4 class="post-title"><a href="event-details.html">Things You Most Likely
                                            Didn't Know About</a></h4>
                                </div>
                                <div class="post-content">
                                    <p>There are many variations of passages of Lorem Ipsum typesetting industry
                                        has been the industry's standard dummy text ever since.</p>
                                </div>
                            </div>
                            <div class="dlab-post-media">
                                <a href="event-details.html"><img
                                        src="{{ asset('templatePMI/images/events/list/pic2.jpg') }}"
                                        alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
            <!-- Latest blog END -->
        </div>
        <!-- contact area END -->
    </div>
@endsection

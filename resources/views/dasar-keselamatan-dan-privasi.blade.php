@extends('layouts.pmi2.apps', ['page' => 'privasi'])

@section('content')
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(images/banner/bnr1.jpg);">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white">Dasar Keselamatan & Privasi</h1>
                    <!-- Breadcrumb row -->
                    <div class="breadcrumb-row">
                        <ul class="list-inline">
                            <li><a href="{{ url('/') }}">Halaman Utama</a></li>
                            <li>Dasar Keselamatan & Privasi</li>
                        </ul>
                    </div>
                    <!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->
        <div class="content-block">
            <!-- Privacy Policy -->
            <div class="section-full content-inner inner-text">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="title">The Industrial Privacy Policy was updated on 25 June 2018.</h4>
                            <p class="font-18">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                                survived not only five centuries, but also the leap into electronic typesetting, remaining
                                essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                                containing Lorem Ipsum passages,<a href="javascript:void(0);"> Contact Us </a>and more
                                recently with desktop publishing software like Aldus PageMaker including versions of Lorem
                                Ipsum.</p>
                            <div class="dlab-divider bg-gray-dark"></div>
                            <h4 class="title">Who We Are and What This Policy Covers</h4>
                            <p class="font-18">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                                survived not only five centuries, but also the leap into electronic typesetting, remaining
                                essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                                containing Lorem Ipsum passages, and more recently with desktop publishing software like
                                Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <div class="dlab-divider bg-gray-dark"></div>
                            <h4 class="title">What personal information we collect</h4>
                            <ul class="list-circle primary m-a0">
                                <li>The Industrial Privacy Policy was updated on 25 June 2018. Lorem Ipsum is simply dummy
                                    text of the printing and typesetting industry. Lorem Ipsum has been the industry's </li>
                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has been the industry's standard dummy text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled it to make a type specimen book.</li>
                                <li>Remaining essentially unchanged. It was popularised in the 1960s with the release of
                                    Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.</li>
                                <li>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </li>
                                <li>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Privacy Policy END -->
        </div>
    </div>
@endsection

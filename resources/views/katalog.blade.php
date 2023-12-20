@extends('layouts.pmi2.apps', ['page' => 'Katalog'])

@section('content')
    <div class="page-content bg-gray">
        <!-- inner page banner -->
        <div class="dlab-bnr-inr overlay-black-middle bg-pt"
            style="background-image:url({{ asset('templatePMI/images/banner/suk-mbna.jpg') }});">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white">Kursus</h1>
                    <!-- Breadcrumb row -->
                    <div class="breadcrumb-row">
                        <ul class="list-inline">
                            <li><a href="{{ url('/') }}">Halaman Utama</a></li>
                            <li>Kursus</li>
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
                            <div class="widget  widget_categories">
                                <h4 class="widget-title">Senarai Kursus</h4>
                                <ul>
                                    @foreach ($jenis_program as $jeniss)
                                        <li><a href="{{ route('katalog.jenis', [$jeniss->jenis_program]) }}">{{ $jeniss->jenis_program }}</a>
                                            ({{ $jeniss->bilangan }})</li>
                                    @endforeach
                                </ul>
                            </div>
                            {{-- <div class="widget widget_archive">
                                <h5 class="widget-title style-1">Kategori Kursus</h5>
                                <ul>
                                    <li><a href="javascript:void(0);">May 2016</a>(1)</li>
                                </ul>
                            </div> --}}
                        </aside>
                    </div>
                    <!-- Side bar END -->
                    <!-- left part start -->
                    <div class="col-lg-9 col-md-7">
                        <div class="row">
                            @php
                                $i = 1;
                            @endphp
                            @forelse ($senaraiProgram as $program)
                                <div class="col-lg-4">
                                    <div class="dlab-box courses-bx" style="min-height: 650px;">
                                        <div class="dlab-media">
                                            <img src="{{ asset('storage/lampiran/' . $program->poster_program) }}"
                                                alt="">
                                        </div>
                                        <div class="dlab-info">

                                            <h6 class="dlab-title"><a href="{{ route('butiran.kursus') }}"
                                                    onclick="event.preventDefault(); document.getElementById('butiran-kursus_{{ $i }}').submit();">{{ $program->nama_program }}
                                                </a></h6>

                                            <form id="butiran-kursus_{{ $i }}"
                                                action="{{ url('butiran-kursus') }}" method="POST" style="display: none;">
                                                @csrf
                                                <input type="hidden" id="id_program" name="id_program"
                                                    value="{{ $program->id_program }}">
                                            </form>
                                            <div class="courses-info">
                                                <p>
                                                    <i class="ti-calendar text-success m-r5"></i> <span style="color: black; font-weight: bold">Tarikh </span> <br>
                                                    {{ \Carbon\Carbon::parse($program->tarikh_mula)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($program->tarikh_akhir)->format('d/m/Y') }}<br>
                                                   <i class="ti-location-pin text-danger m-r5 mt-2"></i> <span style="color: black;; font-weight: bold">Tempat</span> <br> {{ $program->tempatProgram->nama_tempat }} <br>
                                                   <br> 
                                                       <i class="ti-ink-pen text-primary m-r5"></i><span style="color: black;; font-weight: bold"> Anjuran </span> <br> {{ $program->anjuran }}
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
                                </div>
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

                            <!-- Pagination start -->
                            {{-- <div class="pagination-bx rounded-sm primary clearfix m-b30 text-center col-md-12">
                                <ul class="pagination">
                                    <li class="previous"><a href="javascript:void(0);"><i class="ti-arrow-left"></i>
                                            Prev</a></li>
                                    <li class="active"><a href="javascript:void(0);">1</a></li>
                                    <li><a href="javascript:void(0);">2</a></li>
                                    <li><a href="javascript:void(0);">3</a></li>
                                    <li class="next"><a href="javascript:void(0);">Next <i class="ti-arrow-right"></i></a>
                                    </li>
                                </ul>
                            </div> --}}
                            <!-- Pagination END -->
                        </div>
                    </div>
                    <!-- left part start -->
                </div>
            </div>
        </div>
    </div>
@endsection

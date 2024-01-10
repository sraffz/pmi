@extends('layouts.pmi2.apps', ['page' => 'Katalog'])

@section('content')
<div class="page-content bg-gray">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url({{ asset('storage/lampiran/' . $program->poster_program) }});" >
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Butiran Program</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="{{ url('/') }}">Halaman Utama</a></li>
                        <li>Butiran Program</li>
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
                <div class="col-lg-4 col-md-5 m-b30">
                    <aside class="side-bar sticky-top">
                        <div class="widget widget_event_info">
                            <h5 class="widget-title style-1">Butiran Program</h5>
                            <ul>
                                <li>
                                    <i class="la la-calendar"></i>
                                    <span class="title">Tarikh Mula:</span>
                                    <span class="info">{{ \Carbon\Carbon::parse($program->tarikh_mula)->format('d/m/Y')}}</span>
                                </li>
                                <li>
                                    <i class="la la-calendar"></i>
                                    <span class="title">Tarikh Tamat:</span>
                                    <span class="info">{{ \Carbon\Carbon::parse($program->tarikh_akhir)->format('d/m/Y')}}</span>
                                </li>
                                <li>
                                    <i class="la la-clock-o"></i>
                                    <span class="title">Masa:</span>
                                    <span class="info">{{$program->masa}}</span>
                                </li>		
                               						
                                <li>
                                    <i class="la la-user"></i>
                                    <span class="title">Kumpulan Sasaran:</span>
                                    <span class="info">{{$program->golongan_sasar}}</span>
                                </li>
                                {{-- <li>
                                    <i class="la la-money"></i>
                                    <span class="title">Yuran:</span>
                                    <span class="info">RM  @if(is_numeric($program->yuran)) {{ number_format($program->yuran,2)}} @else {{ $program->yuran }} @endif</span>
                                </li> --}}
                                <li>
                                    <i class="la la-map-marker"></i>
                                    <span class="title">Tempat:</span> <br>
                                 </li>	
                                <li>
                                    <i  ></i>
                                     <span class="info">{{$program->tempatProgram->nama_tempat}} </span>
                                </li>	
                            </ul>
                        </div>
                         
                    </aside>
                </div>
                <!-- Side bar END -->
                <!-- left part start -->
                <div class="col-lg-8 col-md-7">
                    <div class="event-single">
                        <div class="dlab-post-meta">
                            
                        </div>
                        <h2 class="dlab-title">{{ $program->nama_program }}</h2>
                        <div class="dlab-media m-b30">
                            <a href="javascript:;"><img src="{{ asset('storage/lampiran/' . $program->poster_program) }}" alt=""></a>
                        </div>
                        <div class="dlab-post-text">
                            <h4>Deskripsi Program</h4>
                            <p>{{$program->deskripsi_program}}</p>
                            <h4>Objektif</h4>
                            <p>{{$program->objektif}}</p>                            
                            <h4>Impak</h4>
                            <p>{{$program->impak}}</p>                            
                            <h4>Maklumat Tambahan</h4>
                            <p>{{$program->maklumat_tambahan ?? 'Tiada'}}</p>                            
                        </div>
                    </div>
                </div>
                <!-- left part start -->
            </div>
        </div>
    </div>
</div>
@endsection

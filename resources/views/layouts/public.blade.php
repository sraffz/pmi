@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet"
          href="{{ asset('vendor/adminlte/dist/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')}} ">
    @stack('css')
    @yield('css')
@stop

@section('body_class', 'skin-' . config('adminlte.skin', 'blue') . ' sidebar-mini ' . ' layout-top-nav ' )

@section('body')
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">
            
            <nav class="navbar navbar-static-top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col col-md-12" style="text-align: center; padding: 15px 15px; color: white;"> <span style=" font-size: 18px; line-height: 20px">Sistem Pembangunan Modal Insan (e-PMI)</span> </div>
                    </div>
                </div>
            </nav>
        </header>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container">         
            <!-- Content Header (Page header) -->
            <section class="content-header">
                @yield('content_header')
            </section>
            <!-- Main content -->
            <section class="content">

                {{-- @include('partials.alerts') --}}
                @include('flash::message')

                @yield('content')

            </section>
            <!-- /.content -->
           
            </div>
            <!-- /.container -->
            
        </div>
        <!-- /.content-wrapper -->

        
        <footer class="main-footer" style="background-color: #3c8dbc; color: white;">
            <center>
                <p style="font-size: 11px;">
                    <b> PENAFIAN </b> <br>
                    Kerajaan Negeri Kelantan tidak bertanggung jawab atas segala kerugian/kerosakan yang disebabkan oleh data yang diperolehi dari laman portal ini. <br>
            
                    {{-- Pejabat Setiausaha Negeri Kelantan, Tingkat 1, Blok 6, Kota Darulnaim, 15503 Kota Bharu, Kelantan. <br>
                    
                    Tel: 09-7481957 <br> --}}
            
                    Hakcipta © Pejabat Setiausaha Kerajaan Negeri Kelantan 
                </p>
            </center>
        </footer>
        

        

    </div>
    <!-- ./wrapper -->
@stop

@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    
    @stack('js')
    @yield('js')

    @include('sweetalert::alert')
@stop

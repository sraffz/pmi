@extends('adminlte::page')

@section('title', 'Senarai Gambar')

@section('content_header')
   
@stop

@section('content')
    
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Senarai Gambar</h3>

        <div class="box-tools pull-right">
            
        </div>
    </div>
    <div class="box-body">

        <div class="container-fluid">
            <div class="row">
                <div class="col col-md-12">
                    <form action="{{ route('program.simpan-gambar', ['id' => $program->id_program]) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                        
                        <div class="form-group has-feedback {{ $errors->has('gambar.*') ? 'has-error' : '' }}">
                            <label for="gambar">Tambah Gambar Program</label>
                            <input type="file" class="form-control" id="gambar" name="gambar[]" multiple="multiple" accept="image/*;capture=camera">
                            @if ($errors->has('gambar.*'))
                                <span class="help-block">
                                    <strong>{{ ucwords($errors->first('gambar.*')) }}</strong>
                                </span>
                            @endif
                        </div>
                        
                    
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('program.index') }}" class="btn btn-info">Kembali</a>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-12">
                    <div class="gal-container">
                        @forelse ($senaraiGambar as $key => $gambar)
                            <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                                <div class="box">
                                <a href="#" data-toggle="modal" data-target="#{{ $key }}">
                                    <img src="{{ asset("storage/lampiran/$gambar->lokasi") }}">
                                </a>
                                <div class="modal fade" id="{{ $key }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <div class="modal-body">
                                        <img src="{{ asset("storage/lampiran/$gambar->lokasi") }}">
                                        </div>
                                        <div class="col-md-12 description">
                                            <a href="{{ route('gambar.program.destroy', ['id' => $gambar->id_gambar_program]) }}" class="btn btn-danger pull-right">Hapus</a>
                                            <a href="{{ asset("storage/lampiran/$gambar->lokasi") }}" class="btn btn-success" download="Gambar">Muatturun</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>     
                            @empty
                                Tiada Gambar
                            @endforelse
                    </div>
                </div>
            </div>
        </div>
     
        


         
    </div>

</div>

    


@stop

@section('css')
    <style>
       
        .gal-container{
            padding: 12px;
        }
        .gal-item{
            overflow: hidden;
            padding: 3px;
        }
        .gal-item .box{
            height: 350px;
            overflow: hidden;
        }
        .box img{
            height: 100%;
            width: 100%;
            object-fit:cover;
            -o-object-fit:cover;
        }
        .gal-item a:focus{
            outline: none;
        }
        /* .gal-item a:after{
            content:"\e003";
            font-family: 'Glyphicons Halflings';
            opacity: 0;
            background-color: rgba(0, 0, 0, 0.75);
            position: absolute;
            right: 3px;
            left: 3px;
            top: 3px;
            bottom: 3px;
            text-align: center;
            line-height: 350px;
            font-size: 30px;
            color: #fff;
            -webkit-transition: all 0.5s ease-in-out 0s;
            -moz-transition: all 0.5s ease-in-out 0s;
            transition: all 0.5s ease-in-out 0s;
        } */
        .gal-item a:hover:after{
            opacity: 1;
        }
        .modal-open .gal-container .modal{
            background-color: rgba(0,0,0,0.4);
        }
        .modal-open .gal-item .modal-body{
            padding: 0px;
        }
        .modal-open .gal-item button.close{
            position: absolute;
            width: 25px;
            height: 25px;
            background-color: #000;
            opacity: 1;
            color: #fff;
            z-index: 999;
            right: -12px;
            top: -12px;
            border-radius: 50%;
            font-size: 15px;
            border: 2px solid #fff;
            line-height: 25px;
            -webkit-box-shadow: 0 0 1px 1px rgba(0,0,0,0.35);
            box-shadow: 0 0 1px 1px rgba(0,0,0,0.35);
        }
        .modal-open .gal-item button.close:focus{
            outline: none;
        }
        .modal-open .gal-item button.close span{
            position: relative;
            top: -3px;
            font-weight: lighter;
            text-shadow:none;
        }
        .gal-container .modal-dialogue{
            width: 80%;
        }
        .gal-container .description{
            position: relative;
            height: 60px;
            top: -60px;
            padding: 10px 25px;
            background-color: rgba(0,0,0,0.5);
            /* color: #fff; */
            /* text-align: left; */
        }
        .gal-container .description h4{
            margin:0px;
            font-size: 15px;
            font-weight: 300;
            line-height: 20px;
        }

        .gal-container .description a:hover:after{
            opacity: 0;
        }
        .gal-container .modal.fade .modal-dialog {
            -webkit-transform: scale(0.1);
            -moz-transform: scale(0.1);
            -ms-transform: scale(0.1);
            transform: scale(0.1);
            top: 100px;
            opacity: 0;
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            transition: all 0.3s;
        }

        .gal-container .modal.fade.in .modal-dialog {
            -webkit-transform: scale(1);
            -moz-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1);
            -webkit-transform: translate3d(0, -100px, 0);
            transform: translate3d(0, -100px, 0);
            opacity: 1;
        }
        @media (min-width: 768px) {
        .gal-container .modal-dialog {
            width: 55%;
            margin: 50 auto;
        }
        }
        @media (max-width: 768px) {
            .gal-container .modal-content{
                height:250px;
            }
        }
        /* Footer Style */
        i.red{
            color:#BC0213;
        }
        .gal-container{
            /* padding-top :75px;
            padding-bottom:75px; */
        }
       
    </style>
@stop

@section('js')
    
@stop
@extends('adminlte::page')

@section('content_header')
{{-- <h1>Dashboard</h1> --}}
@stop

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Senarai Program Dibuka</h3>
        </div>

        <div class="box-body">
            
                
                    @foreach ($senaraiProgramAktifChunk as $programChunk)
                    <div class="row">
                        @foreach ($programChunk as $program)
                        <div class="col col-md-6">
                            <div class="container-fluid well">
                                <div class="images">
                                    <a href="{{ asset('storage/lampiran/'.$program->poster_program) }}" target="_blank">
                                        <img src="{{ asset('storage/lampiran/'.$program->poster_program) }}" style="max-height: 200px" class="img-responsive">
                                    </a> <br><br>
                                </div>

                                <font color=indigo font face='verdana' size='3px'><b> {{ $program->nama_program }} </b></font> 
                                <br> <br>                                  

                                <font color=red <i class='fa fa-calendar' ></i></font> <font face=verdana size='2pt'><b>TARIKH: </b></font>
                                <br>  &nbsp;&nbsp;&nbsp;&nbsp;
                                {{  $program->tarikh_mula->format('d/m/Y') }} - {{ $program->tarikh_akhir->format('d/m/Y') }}
                                
                                <br> <br>

                                <font color=red <i class='fa fa-hourglass-half' ></i></font> <font face=verdana size='2pt'><b>&nbsp;MASA: </b></font><br>
                                <font face=verdana size='2px'> &nbsp;&nbsp;&nbsp;&nbsp;{{ $program->masa }} </font>  
                                <br> <br>                                 

                                <font color=red <i class='fa fa-users' ></i></font> <font face=verdana size='2pt'><b>&nbsp;JUMLAH PESERTA: </b></font><br>
                                <font face=verdana size='2px'> &nbsp;&nbsp;&nbsp;&nbsp;{{ $program->jumlah_peserta }} orang </font>  
                                <br> <br>

                                <font color=red <i class='fa fa-quote-left' ></i></font> <font face=verdana size='2pt'><b>&nbsp;OBJEKTIF: </b></font><br>
                                <font face=verdana size='2px'> &nbsp;&nbsp;&nbsp;&nbsp;{{ $program->objektif }} </font>  
                                <br> <br>

                                <font color=red <i class='fa fa-quote-left' ></i></font> <font face=verdana size='2pt'><b>&nbsp;IMPAK: </b></font><br>
                                <font face=verdana size='2px'> &nbsp;&nbsp;&nbsp;&nbsp;{{ $program->impak }} </font>  
                                <br> <br>

                                <font face=verdana size='2pt'><b>MAKLUMAT TAMBAHAN: </b></font><br>
                                <font face=verdana size='2px'>{{ $program->maklumat_tambahan ?? 'Tiada'}} </font>  
                                <br> <br>
                                <a href="{{ route('program.show', ['id' => $program->id_program]) }}" class="btn btn-success">Lihat</a> <br> <br>    
                            </div>
                            
                        </div> 
                        @endforeach
                        
                    </div>    
                    @endforeach
                
               

               

                
            </div>
            <!-- /.box-body -->
        </div>

    @stop
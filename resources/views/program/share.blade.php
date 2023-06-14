@extends('layouts.public')

@section('content')
<div class="container-fluid">
    <div class="row" style="margin-bottom: 10px">
        <div class="col col-md-12">
            <img src="{{ asset('images/suk.png') }}" class="center-block" alt="" style="max-height: 13rem;">
        </div>
    </div>
    <div class="box box-primary">
      <div class="box-header">
        <center>
          <h4 class="box-title"> <strong>{{ $program->nama_program }}</strong> </h4>
        </center>
        
          
      </div>
      <div class="box-body">
        <div class="row" style="margin-bottom: 10px;">
            <div class="col-md-12">
              <center>
                <a href="@if(isset($program->poster_program)) {{ asset('storage/lampiran/'.$program->poster_program) }} @endif">
                <img src="@if(isset($program->poster_program)) {{ asset('storage/lampiran/'.$program->poster_program) }} @endif" class="img-fluid" style="max-height: 200px;">
              </a>
              </center>
              
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Bil.</th>
                        <th>Keterangan</th>
                        <th>Butiran</th>
                      </tr>
                    </thead>
                    <tbody>     
                          <tr>
                            <td>1</td>
                            <td>Deskripsi Program</td>
                            <td>{{$program->deskripsi_program}}</td>
                          </tr>

                          <tr>
                            <td>2</td>
                            <td>Tarikh Mula</td>
                            <td>{{$program->tarikh_mula->format('d/m/Y')}}</td>
                          </tr>

                          <tr>
                            <td>3</td>
                            <td>Tarikh Tamat</td>
                            <td>{{$program->tarikh_mula->format('d/m/Y')}}</td>
                          </tr>

                          <tr>
                            <td>4</td>
                            <td>Tempat</td>
                            <td>{{$program->tempatProgram->nama_tempat}}</td>
                          </tr>

                          <tr>
                            <td>5</td>
                            <td>Masa</td>
                            <td>{{$program->masa}}</td>
                          </tr>

                          <tr>
                            <td>6</td>
                            <td>Golongan Sasar</td>
                            <td>{{$program->golongan_sasar}}</td>
                          </tr>

                          <tr>
                            <td>7</td>
                            <td>Yuran</td>
                            <td>@if(is_numeric($program->yuran)) RM {{ number_format($program->yuran,2)}} @else {{ $program->yuran }} @endif</td>
                          </tr>

                          <tr>
                            <td>8</td>
                            <td>Objektif</td>
                            <td>{{$program->objektif}}</td>
                          </tr>

                          <tr>
                            <td>9</td>
                            <td>Impak</td>
                            <td>{{$program->impak}}</td>
                          </tr>
                      </tbody>
                  </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <center>
                    <a href="{{ route('login') }}" class="btn btn-success">Daftar Segera</a>
                </center>
                
            </div>
        </div>

                  

      </div>
            
    </div>
</div>
    
   
@endsection
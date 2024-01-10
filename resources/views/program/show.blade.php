@extends('adminlte::page')

@section('content_header')

@stop

@section('content')


    <div class="box box-primary">
      <div class="box-header">
        <h4 class="box-title">Program {{ $program->nama_program }}</h4>
          
      </div>
      <div class="box-body">
        <div class="container-fluid  ">
          <table id="programTable" class="table table-bordered table-striped" width="100%">
            
              <tr>
                <td>
                  <a href="@if(isset($program->poster_program)) {{ asset('storage/lampiran/'.$program->poster_program) }} @endif">
                    <img src="@if(isset($program->poster_program)) {{ asset('storage/lampiran/'.$program->poster_program) }} @endif"   width="100%">
                  </a>
                  
                </td>
                
              </tr>
              <tr>
                <td>
                  <table id="example1" class="table table-bordered table-striped" >
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
                            <td class="wrap" align="justify">{{$program->deskripsi_program}}</td>
                          </tr>

                          <tr>
                            <td>2</td>
                            <td>Tarikh Mula</td>
                            <td>{{$program->tarikh_mula->format('d/m/Y')}}</td>
                          </tr>

                          <tr>
                            <td>3</td>
                            <td>Tarikh Tamat</td>
                            <td>{{$program->tarikh_akhir->format('d/m/Y')}}</td>
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
                            <td>Gred Sasaran</td>
                            <td>{{$program->golongan_sasar}}</td>
                          </tr>

                          {{-- <tr>
                            <td>7</td>
                            <td>Yuran</td>
                            <td>RM  @if(is_numeric($program->yuran)) {{ number_format($program->yuran,2)}} @else {{ $program->yuran }} @endif</td>
                          </tr> --}}

                          <tr>
                            <td>8</td>
                            <td class="wrap" align="justify">Objektif</td>
                            <td>{{$program->objektif}}</td>
                          </tr>

                          <tr>
                            <td>9</td>
                            <td>Impak</td>
                            <td class="wrap" align="justify">{{$program->impak}}</td>
                          </tr>

                          <tr>
                            <td>10</td>
                            <td>Maklumat Tambahan</td>
                            <td class="wrap" align="justify">{{$program->maklumat_tambahan ?? 'Tiada'}}</td>
                          </tr>
                      </tbody>
                  </table>
                </td>
              </tr>
              @role(['superadmin','urusetia','pengurusan'])
              <tr>
                <td>
                  <a href="{{ route('penceramah.program.show', ['id' => $program->id_program]) }}" class="btn bg-navy">Senarai Penceramah</a>
                  <a href="{{ route('show.senarai.peserta', ['id' => $program->id_program]) }}" class="btn bg-maroon">Senarai Peserta</a>
                  <a href="{{ route('program.kehadiran', ['id' => $program->id_program]) }}" class="btn btn-warning">Senarai Kehadiran</a>
                  <a href="{{ route('kaji-selidik.graph', ['id' => $program->id_program]) }}" class="btn btn-info">Maklum Balas Program</a>
                </td>
              </tr>
              <tr>
                <td>
                    {{-- <a href="../laporanbaru/slip_program.php?programid= " target="_blank"> <button class='btn btn-success'> <i class='fa fa-print' ></i> Cetak </button></a> --}}
                    <a href="{{ route('program.edit', ['id'=> $program->id_program])}}" class="btn btn-primary">Kemaskini</a>
                    <a href="{{ url()->previous() }}" class="btn btn-danger">Kembali </a> 
                </td>
              </tr>
              @endrole
              
              @role('individu')
              <tr>
                <td>
                  @if (auth()->user()->kehadiranProgram())
                    @if (auth()->user()->kehadiranProgram()->where('program.id_program', $program->id_program)->exists())
                      @if($program->aturcara()->exists()) <a href="{{ asset('storage/lampiran/'.$program->aturcara()->first()->lokasi) }}" class="btn bg-primary" download="Aturcara" target="_blank">Aturcara</a> @endif
                      @if($program->slaid()->exists()) <a href="{{ asset('storage/lampiran/'.$program->slaid()->first()->lokasi) }}" class="btn bg-maroon" download="Slaid" target="_blank">Slaid</a> @endif
                    @endif    
                  @endif
                    <a href="{{ url()->previous() }}" class="btn btn-danger">Kembali </a> 
                </td>
              </tr>
              @endrole
          </table>
        </div>
          
      </div>
            
    </div>
         
    
   
@endsection
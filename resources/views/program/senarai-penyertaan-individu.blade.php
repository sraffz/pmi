@extends('adminlte::page')

@section('content_header')

@stop

@section('content')

        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Senarai Penyertaan Program</h3>
          </div>

          <div class="box-body">
            <table id="programTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Bil</th>
                <th>Nama Program</th>
                <th>Tarikh</th>
                <th>Tempat</th>
                <th>Catatan</th>
                <th>Kehadiran</th>
                <th>Tindakan</th>
              </tr>
              </thead>
              <tbody>
                  @php
                      $id_pengguna = auth()->user()->id_pengguna;
                  @endphp
                  @foreach ($senaraiProgram as $program)
                    <tr>
                        <td> {{ $loop->iteration }}</td>
                        <td> {{ $program->nama_program }} </td>
                        <td> {{ $program->tarikh_mula->format('d.m.Y') }} </td>
                        <td> {{ $program->tempatProgram->nama_tempat }} </td>
                        <td> 
                          @if($program->daftar_program->status_kajiselidik && $program->daftar_program->status_kehadiran == 1)
                            <span class="label bg-green">Telah Selesai</span>
                          @endif
                          @if(!$program->daftar_program->status_kajiselidik && ($program->daftar_program->status_kehadiran == 1 || $program->daftar_program->status_kehadiran == 2))
                            <span class="label bg-yellow">Sila Jawab Kaji Selidik</span>
                          @endif
                          @if($program->daftar_program->status_kehadiran == 0)
                            <span class="label bg-red">Tidak Hadir</span>
                          @endif
                          @if($program->daftar_program->status_kehadiran == 2)
                            <span class="label bg-maroon">Hadir Sebahagian</span>
                          @endif
                        </td>
                        <td>
							
                          <ul>
                          @foreach (checkHadir($program->id_program, $id_pengguna) as $tarikh => $kehadiran)
                            	<li>{{ $tarikh }} - {!! $kehadiran !!}</li>
                          @endforeach  
                          </ul>
                          
                        </td>
                        <td>
                          @if (!$program->daftar_program->status_kajiselidik && ($program->daftar_program->status_kehadiran == 1 || $program->daftar_program->status_kehadiran == 2))
                            <a href="{{route('create.peserta.kajiselidik',['idProgram' =>$program->id_program ])}}" class="btn btn-success">Jawab Kaji Selidik</a>  
                          @endif

                          @if ($program->daftar_program->status_kajiselidik && $program->daftar_program->status_kehadiran == 1)
                            <a href="{{route('program.sijil',['url_sijil' => $program->daftar_program->url_sijil])}}" class="btn bg-purple" target="_blank">Sijil Penyertaan</a>  
                          @endif
                           
                        </td>
                    </tr>
                  @endforeach

              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>


@stop

@section('js')
    <script>
        $('#programTable').DataTable();
    </script>
@stop
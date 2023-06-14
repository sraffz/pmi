@extends('adminlte::page')

@section('content')


    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">STATUS PROGRAM</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="programTable" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Bil</th>
            <th>Nama Program</th>
            <th>Tarikh</th>
            <th>Tempat</th>
            <th>Status Program</th>
            <th>Program</th>
            <th>Penyertaan</th>
            <th>Kehadiran</th>
            <th>Arkib</th>
          </tr>
          </thead>
          <tbody>
              
              @foreach ($senarai_program as $program)
                <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td> 
                        @if($program->trashed()) 
                            {{ $program->nama_program }}
                        @else
                            <a href="{{ route('program.show', ['id' => $program->id_program]) }}" class="btn bg-purple">{{ $program->nama_program }}</a>
                        @endif
                        
                    </td>
                    <td> {{ $program->tarikh_mula->format('d.m.Y') }} </td>
                    <td> {{ $program->tempatProgram->nama_tempat }} </td>
                    <td>
                        <ul>
                            <li>@if($program->status_aktif == 1) <small class="label bg-green">Program Dibuka</small> @else <small class="label bg-red">Program Ditutup</small> @endif</li>
                            <li>@if($program->status_penyertaan == 1) <small class="label bg-green">Penyertaan Dibuka</small> @else <small class="label bg-red">Penyertaan Ditutup</small> @endif</li>
                            <li>@if($program->status_kehadiran == 1) <small class="label bg-green">Kehadiran Dibuka</small> @else <small class="label bg-red">Kehadiran Ditutup</small> @endif</li>
                            @if($program->trashed()) <li><small class="label bg-blue">ARKIB</small></li> @endif
                          </ul>
                    </td>
                    <td>

                        @if ($program->status_aktif == 0 && !$program->trashed())
                            <a href="{{ route('toggle_program',['id' => $program->id_program ]) }}" class="btn btn-success btn-block" onclick="return confirm('Adakah Anda Ingin Menukar Status Program Ini?')">Buka Program</a>
                        @elseif ($program->status_aktif == 0 && $program->trashed())
                            <a href="#" class="btn btn-success btn-block"  disabled="disabled">Buka Program</a>
                        @else
                            <a href="{{ route('toggle_program',['id' => $program->id_program ]) }}" class="btn btn-danger btn-block" onclick="return confirm('Adakah Anda Ingin Menukar Status Program Ini?')" >Tutup Program</a>
                            
                        @endif

                        <a href="{{ route('program.destroy',['id' => $program->id_program ]) }}" onclick="return confirm('Adakah Anda Ingin Padam Program Ini?')" class="btn btn-danger btn-block" @if($program->status_aktif == 1)  disabled="disabled" @endif>Hapus Program</a>
                    
                    </td>

                    <td>
                        @if ($program->status_aktif == 1 && !$program->trashed() && $program->status_penyertaan == 0)
                            <a href="{{ route('toggle_penyertaan',['id' => $program->id_program ]) }}" class="btn btn-success" onclick="return confirm('Adakah Anda Ingin Menukar Status Program Ini?')">Buka Penyertaan</a>
                        @elseif($program->status_aktif == 1 && !$program->trashed() && $program->status_penyertaan == 1)
                            <a href="{{ route('toggle_penyertaan',['id' => $program->id_program ]) }}" class="btn btn-danger" onclick="return confirm('Adakah Anda Ingin Menukar Status Program Ini?')" >Tutup Penyertaan</a>
                        @endif
                    </td>
                    <td>
                        @if ($program->status_aktif == 1 && !$program->trashed() && $program->status_kehadiran == 0)
                            <a href="{{ route('toggle_kehadiran',['id' => $program->id_program ]) }}" class="btn btn-success" onclick="return confirm('Adakah Anda Ingin Menukar Status Program Ini?')">Buka Kehadiran</a>
                        @elseif($program->status_aktif == 1 && !$program->trashed() && $program->status_kehadiran == 1)
                            <a href="{{ route('toggle_kehadiran',['id' => $program->id_program ]) }}" class="btn btn-danger" onclick="return confirm('Adakah Anda Ingin Menukar Status Program Ini?')" >Tutup Kehadiran</a>
                        @endif
                    </td>

                    <td>
                        @if ($program->trashed())
                            <a href="{{ route('toggle_arkib',['id' => $program->id_program ]) }}" class="btn btn-default" style="background-color: #2c2ce9; color:white; width:110px;">Buka Arkib</a>
                        @else
                            <a href="{{ route('toggle_arkib',['id' => $program->id_program ]) }}" class="btn btn-default" style="background-color: #1919af; color:white; width:110px;">Arkib</a>
                        @endif
                    </td>
                    
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
@stop

@section('js')
    <script>
        $('#programTable').DataTable();
    </script>
@stop
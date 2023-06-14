@extends('adminlte::page')

@section('content_header')

@stop

@section('content')
    <!-- Default box -->
    <div class="box-body">
        <div class="box">
          <div class="box-header">
            <center><h3 class="box-title"><b>SENARAI PROGRAM</b></h3></center>
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
                <th>Tindakan</th>
              </tr>
              </thead>
              <tbody>
                  @php
                      $i=1;
                  @endphp
                  @foreach ($senaraiProgram as $program)
                    <tr>
                        <td> {{ $i++ }}</td>
                        <td> {{ $program->nama_program }} </td>
                        <td> {{ $program->tarikh_mula->format('d.m.Y') }} </td>
                        <td> {{ $program->tempatProgram->nama_tempat }} </td>
                        

                        <td>
                         
                        <a href="{{route('senarai.permohonan.peserta',['id' =>$program->id_program ])}}" class="btn btn-primary">Senarai Peserta</a>

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
@extends('adminlte::page')

@section('content_header')

@stop

@section('content')
    <!-- Default box -->
    <div class="box-body">
        <div class="box">
          <div class="box-header">
            <center><b><h3 class="box-title">SENARAI PROGRAM</b></h3></center>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="programTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Bil</th>
                <th>Nama Program</th>
                <th>Muat Naik Dokumen</th>

              </tr>
              </thead>
              <tbody>
                  @php
                      $i=1;
                  @endphp
                  @foreach ($senarai_program as $program)
                    <tr>
                        <td> {{ $i++ }}</td>
                        <td> {{ $program->nama_program }} </td>

                        <td> 
                        <a href="{{ route('program.slide', ['id' => $program->id_program]) }}"><input class="btn btn-default submit " type="submit" name="back" value="Slaid" style="background-color: #660066; color:white; width:85px;"></a>                         
                        <a href="{{ route('program.aturcara', ['id' => $program->id_program]) }}"><input class="btn btn-default submit " type="submit" name="back" value="Aturcara" style="background-color: #cc6699; color:white; width:85px;"></a>
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
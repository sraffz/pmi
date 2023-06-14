

@extends('adminlte::page')
@section ('content')

 <div class="box box-primary">
  <div class="box-header with-border">
<h4 class="box-title">Penilaian Kaji Selidik Program</h4>
  </div>
    
    <div class="box-body">
      <table id="belanjawanTable" class="table table-bordered table-striped">
        <thead>
          <tr role="row">
            <th>Bil.</th>
            <th>Program</th>

            <th>Tindakan</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($senaraiKajiSelidik as $program)
          <tr>
            <td width="10%"> {{ $loop->iteration }}</td>
            <td>{{$program->nama_program}}</td>
            <td width="10%">
              <a href="{{ route('kaji-selidik.graph', ['id' => $program->id_program]) }}" class="btn btn-primary btn-block">Lihat</a>
            </td>



          </tr>
          @endforeach
        </tbody>

      </table>
    </div>

  </div>

 



@endsection

@section('js')
    <script>
      $('#belanjawanTable').DataTable({
        
      })
    </script>
@endsection 
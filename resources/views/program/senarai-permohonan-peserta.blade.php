
@extends('adminlte::page')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">   


@endsection
@section('content')


      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Senarai Permohonan Peserta Program : <strong>{{ $program->nama_program }}</strong> </h3>

          <div class="box-tools pull-right">
            <h3 class="box-title">Kuota Peserta : {{ $program->kuota_peserta }} / Jumlah Peserta : {{ $program->jumlah_peserta }}</h3>
          </div>
        </div> 
    
        <div class="box-body pad">
    
    
          <table id="senaraiPesertaTable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Bil.</th>
                <th>Nama Peserta</th>
                <th>No kad pengenalan</th>
                <th>Tindakan</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($program->senaraiPermohonanPeserta as $id => $peserta) 
                
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{$peserta->nama_penuh}}</td>
                  <td>{{$peserta->no_kad_pengenalan}}</td> 
                  <td width="10%">
                    <a class='btn btn-success' href='{{route('pengesahan.permohonan.peserta', ['idProgram' => $program->id_program, 'idPengguna' => $peserta->id_pengguna])}}'>Terima Permohonan</a>
                  </td>
                </tr>
                @endforeach 
              </tbody>
            </table>
            
        </div>
  
      </div>
                
 

        
</section>





@endsection
@section('js')
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<script> 

$(document).ready(function() {
  $('.js-example-basic-multiple').select2();

  $('#senaraiPesertaTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Malay.json"
            },
            "responsive" : true,
            "columnDefs" : [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 1, targets: 1 }
                // { responsivePriority: 1, targets: -1 }
            ]
          })
});

</script>
@endsection
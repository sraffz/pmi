@extends('adminlte::page')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">   


@endsection
@section('content')
<section class="content">
  <div class="row">
    <div class="col-md-12">

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Senarai Gambar Program</h3>
        </div> 
      </div>

      <div class="box-body pad">
    
        <div class="box-tools">
          <form role="form" action = "{{route('update.senarai.peserta',['id' => $program->id_program])}}" method = "post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
          
          
              <div class="form-group">
                <label>Tambah Peserta</label>
                <select class="js-example-basic-multiple" name="senaraiPeserta[]" multiple="multiple">
                  <option></option>
                  @foreach ($senaraiPengguna as $individu)
                    <option value="{{$individu->id_pengguna}}">{{$individu->no_kad_pengenalan}} - {{$individu->nama_penuh}}</option>
                  @endforeach
                </select> 
              </div>
                <button type="submit" class="btn btn-primary">Tambah</button>            
          </form>
        </div>
        <hr>
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
              @foreach ($program->senaraiPeserta as $id => $peserta) 
              @php
                  $id++;
              @endphp
              <tr>
                <td>{{$id}}</td>
                <td>{{$peserta->nama_penuh}}</td>
                <td>{{$peserta->no_kad_pengenalan}}</td> 
                <td><p><a class='btn btn-success' href='{{route('delete.peserta', ['id_program' => $program->id_program, 'id_peserta' => $peserta->id_pengguna])}}'>Batal</a></p> 
              </tr>
              @endforeach 
            </tbody>
          </table>
          
      </div>

    </div>
              
  </div>
</div>
  

      
</section>

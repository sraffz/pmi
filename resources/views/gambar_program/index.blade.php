@php
//dd($SenaraiPenceramah);
@endphp 

@extends('adminlte::page')

@section('content')

  <div class="box">
    <div class="box-header">
        <center><h4 class="box-title"><b>SENARAI GAMBAR PROGRAM</b></h4></center>
    </div> 

    <div class="box-body">

        <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>Bil</th>
              <th>Nama Program</th>
              <th width="100px">Tindakan</th>
            </tr>
          </thead>

        <tbody>

          @foreach ($senaraiGambarProgram as $gambarProgram)
          <tr>
         
             
              <td> {{ $loop->iteration }}</td> 
              <td>{{$gambarProgram->nama_program}}</td>
              <td>
                {{-- <a class='btn btn-success' href=''>Kemaskini</a> --}}

                <a href="{{ route('gambar.program.show', ['id' => $gambarProgram->id_program]) }}" class='btn btn-info btn-block'>Lihat</a>
                {{-- <a class='btn btn-danger'  >Padam</a> --}}
                {{-- <a class='btn btn-info' href='{{ route('penceramah.create', ['id_penceramah' => $penceramah->id_penceramah] ) }}'>Add</a> --}}
              </td>   
          </tr>
          @endforeach
        </tbody>
        </table>
          </div>
 
@endsection

@section('js')
    <script>
      $('#example1').DataTable()
    </script>
@endsection 
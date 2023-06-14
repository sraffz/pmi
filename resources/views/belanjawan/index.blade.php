@extends('adminlte::page')

@section('content_header')

@stop

@section('content')

{{-- <div class="box box-primary"> --}}
   <!-- Default box -->
   <div class="box-body">
    <div class="box">
      <div class="box-header">

  {{-- <div class="box-header"> --}}
    <center><b><h3 class="box-title">SENARAI BELANJAWAN</b></h3></center>

  <!-- Default box -->
  
 
</div>

<div class="box-body">
    <table id="belanjawanTable" class="table table-bordered table-striped">
       <thead>

          <tr>
            <th>Bil</th>
            <th>Program</th>
            <th>Jumlah Belanjawan</th>
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
            <td>{{$program->nama_program}}</td>
            <td>{{$program->belanjawan->jumlah}}</td>

            <td><a class='btn btn-success'
                href='{{ route('belanjawan.edit', ['id' => $program->belanjawan->id_belanjawan]) }}'>Detail</a>
            </td>
            
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
    </div>

  </div>

@stop

@section('js')
    <script>
      $('#belanjawanTable').DataTable({
        
      })
    </script>
@stop
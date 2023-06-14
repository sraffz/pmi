@extends('adminlte::page')
@section('css')


@endsection
@section('content')


  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Senarai Penceramah Program : <strong>{{ $program->nama_program }}</strong></h3>
      
    </div>

    <div class="box-body">
      <div class="box-tools">
        <form action="{{route('penceramah.program.update',['id' => $program->id_program])}}" method="post">

          {{ method_field('PUT') }}
          {{ csrf_field() }}

        <div class="form-group">

          <label>Pilih Penceramah</label>
          <select class="js-example-basic-multiple" name="penceramah[]" multiple="multiple">

            @foreach ($senaraiPenceramah as $id => $penceramah)
            <option value="{{$id}}">{{$penceramah}}</option>
            @endforeach

          </select>

        </div>
        <button type="submit" class="btn btn-linkedin">Kemaskini</button>
      </form>
      </div>
      <hr>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Bil.</th>
            <th>Nama Penceramah</th>
            <th>No kad pengenalan</th>
            <th>Tindakan</th>
          </tr>
        </thead>


        <tbody>

          @php
          $i=1;
          @endphp

          @foreach ($program->senaraiPenceramah as $programPenceramah)
          <tr>
            <td>{{$i++}}</td>
            <td>{{$programPenceramah->nama_penceramah}}</td>
            <td>{{$programPenceramah->no_kad_pengenalan}}</td>

            <td>
              <a class='btn btn-twitter'
                href='{{route('penceramah.edit', ['id' => $programPenceramah->id_penceramah])}}'>Detail</a>
            </td>
          </tr>

          @endforeach
        </tbody>



      </table>
    </div>









    <div class="box-footer">
      


    </div>

</div>

@endsection
@section('js')

<script> 

  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
  });

</script>
@endsection
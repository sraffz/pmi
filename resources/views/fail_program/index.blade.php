@php
  

@endphp 
@extends('adminlte::page')

@section('content')

<div class="box-body">
  <div class="box">

  <div class="box-header">
    <center><b><h3 class="box-title">SENARAI FAIL PROGRAM</b></h3></center>
  </div>

  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>

  <!-- /.box-header -->
  <div class="box-tools pull-right">
    <a href=" {{ route('fail_program.create') }}" class="btn btn-success">+ Tambah Fail Program</a>
    <br><br>
  </div>
  
        

          <table class="table table-bordered">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
          <tr role="row">
          <th class="sorting" tabindex="10" aria-contro>Bil</th>
          <th class="sorting" tabindex="10" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Nama Fail</th>
          <th class="sorting" tabindex="10" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Jenis Fail</th>
          <th class="sorting" tabindex="10" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Lokasi</th>
          <th class="sorting" tabindex="10" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Tindakan</th>
          </tr>
        </thead>

        <tfoot>
        <tbody>

            @php
          $i=1;
          @endphp  

                @foreach ($senaraiFail as $fail_program)
                    
                        <tr>
                        <td> {{ $i++ }}</td>
                        <td>{{$fail_program->nama_fail}}</td>
                        <td>{{$fail_program->jenis_fail}}</td>
                        <td>{{$fail_program->lokasi}}</td>

                        {{-- <td><p></p> --}}
                          <td><p><a class='btn btn-danger' href='{{ route('fail_program.destroy', ['id_fail' => $fail_program->id_fail] ) }}' onclick="return confirm('Adakah Anda Ingin Padam Maklumat fail program Ini?')">Padam</a></p> 
                          
                            <p><a class='btn btn-success' href='{{ route('fail_program.show', ['id' => $fail_program->id_fail]) }}'>Kemaskini</a></p>

                        
                          </tr>
                        @endforeach

                        
                      </tbody>
                    </tfoot>                 
      </thead>

      
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
 </section> 
<!-- /.content -->
</div>


@endsection
@section('js')

<script>
  $('#example1').DataTable()
</script>
    
@endsection


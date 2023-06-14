@extends('adminlte::page')

@section('content')
<section class="content">
  <div class="row">
    <div class="col-md-12">


<form action = "{{route('fail_program.edit', ['id' => $fail_program->id_fail])}}" method = "post">
    {{ method_field('put') }}
    {{ csrf_field() }}

    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">KEMASKINI MAKLUMAT FAIL PROGRAM</h3>
        <br><br><br>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form">
 
           <div class="form-group  has-feedback {{ $errors->has('nama_fail') ? 'has-error' : '' }} ">
            <label for="nama_fail">Nama fail</label>
              <input type="text" class="form-control" id="nama_fail" name="nama_fail" value = '{{ $fail_program->nama_fail }}' />
              
              @if ($errors->has('nama_fail'))
              <span class="help-block">
                  <strong>{{ ucwords($errors->first('nama_fail')) }}</strong>
              </span>
              @endif

            </div>

            <div class="form-group  has-feedback {{ $errors->has('jenis_fail') ? 'has-error' : '' }} ">
               <label for="jenis_fail">Jenis Fail</label>
                <input type="text" class="form-control" id="jenis_fail" name="jenis_fail" value = '{{ $fail_program->jenis_fail }}' />
                
                @if ($errors->has('jenis_fail'))
                <span class="help-block">
                    <strong>{{ ucwords($errors->first('jenis_fail')) }}</strong>
                </span>
                @endif

              </div>

            <div class="form-group  has-feedback {{ $errors->has('lokasi') ? 'has-error' : '' }} ">
              <label for="lokasi">Lokasi</label>
                <input type="text" class="form-control" id="lokasi" id="lokasi" name="lokasi" value = '{{ $fail_program->lokasi }}' />
             
                @if ($errors->has('lokasi'))
                <span class="help-block">
                    <strong>{{ ucwords($errors->first('lokasi')) }}</strong>
                </span>
                @endif

              </div>

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Kemaskini</button>
          </div>
        </form>
      </div>

</table>
</form>
</body>
</html>


@stop
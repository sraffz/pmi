@extends('adminlte::page')

@section('content')
<form action = "{{ route('failprogram.store' )}}" method = "post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <table>
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Tambah Fail</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form">
    <div class="box-body">

      <div class="form-group  has-feedback {{ $errors->has('nama_fail') ? 'has-error' : '' }} ">
        <label for="nama_fail">Nama Fail</label>
        <input type="text" class="form-control" id="nama_fail" placeholder="Nama Fail" name="nama_fail">
        @if ($errors->has('nama_fail'))
            <span class="help-block">
            <strong>{{ ucwords($errors->first('nama_fail')) }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group  has-feedback {{ $errors->has('jenis_fail') ? 'has-error' : '' }} ">
        <label for="jenis_fail">Jenis Fail</label>
        <input type="Jenis Fail" class="form-control" id="jenis_fail" placeholder="Jenis Fail" name="jenis_fail">
        @if ($errors->has('jenis_fail'))
            <span class="help-block">
            <strong>{{ ucwords($errors->first('jenis_fail')) }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group has-feedback {{ $errors->has('') ? 'has-error' : '' }} ">
        <label for="upload_fail">Pilih Fail</label>
        <input type="file" id="upload_fail">
        @if ($errors->has(''))
            <span class="help-block">
            <strong>{{ ucwords($errors->first('')) }}</strong>
            </span>
        @endif
      </div>

        <div class="form-group">
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
              </form>
            </div>
            <!-- /.box -->
</div>
</div>
</div>
  </table>
    
@endsection

 @section('js')

<script>

  <script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script> 
   //Date range picker with time picker 
   $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})

   Date picker
   $('#datepicker').datepicker({
      autoclose: true
    })
</script>
   //Date picker 
   $('#datepicker').datepicker({
       autoclose: true };
    
 </script> 
    
@endsection  
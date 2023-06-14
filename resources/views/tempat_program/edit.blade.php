@extends('adminlte::page')

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
      <h3 class="box-title">Kemaskini Tempat Program</h3>

     
  </div>
  <div class="box-body">
      <form action="{{ route('tempat_program.update',['id' => $tempat_program->id]) }}" method="POST" class="col-lg-6" id="tempatForm">
          {{ csrf_field() }}

          <div class="form-group has-feedback {{ $errors->has('nama_tempat') ? 'has-error' : '' }}">

              <label for="nama_tempat">Nama</label>
              <input type="text" name="nama_tempat" class="form-control"
                  value="{{ old('nama_tempat', $tempat_program->nama_tempat) }}" />

              @if ($errors->has('nama_tempat'))
              <span class="help-block">
                  <strong>{{ ucwords($errors->first('nama_tempat')) }}</strong>
              </span>
              @endif

          </div>

      </form>           
  </div>
  <div class="box-footer">
      <button type="submit" class="btn btn-primary" form="tempatForm">Simpan</button>
      <a href="{{ route('tempat_program.index') }}" class="btn btn-info">Kembali</a>

  </div>
  
</div>
@stop
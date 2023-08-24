@extends('adminlte::page')

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
      <h3 class="box-title">Kemaskini Jenis Program</h3>

     
  </div>
  <div class="box-body">
      <form action="{{ route('jenis_program.update',['id' => $jenis_program->id]) }}" method="POST" class="col-lg-6" id="tempatForm">
          {{ csrf_field() }}

          <div class="form-group has-feedback {{ $errors->has('nama_jenis') ? 'has-error' : '' }}">

              <label for="nama_jenis">Nama</label>
              <input type="text" name="nama_jenis" class="form-control"
                  value="{{ old('nama_jenis', $jenis_program->nama_jenis) }}" />

              @if ($errors->has('nama_jenis'))
              <span class="help-block">
                  <strong>{{ ucwords($errors->first('nama_jenis')) }}</strong>
              </span>
              @endif

          </div>

      </form>           
  </div>
  <div class="box-footer">
      <button type="submit" class="btn btn-primary" form="tempatForm">Simpan</button>
      <a href="{{ route('jenis_program.index') }}" class="btn btn-info">Kembali</a>

  </div>
  
</div>
@stop
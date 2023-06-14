@extends('adminlte::page')

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
      <h3 class="box-title">Kemaskini Zoom Meeting</h3>

     
  </div>
  <div class="box-body">
      <form action="{{ route('program.update-zoom',['zoom' => $zoom]) }}" method="POST" class="col-lg-6" id="zoomForm">
          {{ csrf_field() }}

          <div class="form-group has-feedback {{ $errors->has('url') ? 'has-error' : '' }}">
              <label for="url">Invite URL</label>
              <input type="text" name="url" class="form-control"
                  value="{{ old('url', $zoom->url) }}" />
              @if ($errors->has('url'))
              <span class="help-block">
                  <strong>{{ ucwords($errors->first('url')) }}</strong>
              </span>
              @endif
          </div>

          <div class="form-group has-feedback {{ $errors->has('meeting_code') ? 'has-error' : '' }}">
              <label for="meeting_code">Meeting Code</label>
              <input type="text" name="meeting_code" class="form-control"
                  value="{{ old('meeting_code', $zoom->meeting_code) }}" />
              @if ($errors->has('meeting_code'))
              <span class="help-block">
                  <strong>{{ ucwords($errors->first('meeting_code')) }}</strong>
              </span>
              @endif
          </div>

          <div class="form-group has-feedback {{ $errors->has('pass_code') ? 'has-error' : '' }}">
              <label for="pass_code">Passcode</label>
              <input type="text" name="pass_code" class="form-control"
                  value="{{ old('pass_code', $zoom->pass_code) }}" />
              @if ($errors->has('pass_code'))
              <span class="help-block">
                  <strong>{{ ucwords($errors->first('pass_code')) }}</strong>
              </span>
              @endif
          </div>

      </form>           
  </div>
  <div class="box-footer">
      <button type="submit" class="btn btn-primary" form="zoomForm">Simpan</button>
      <a href="{{ route('program.index') }}" class="btn btn-info">Kembali</a>

  </div>
  
</div>
@stop
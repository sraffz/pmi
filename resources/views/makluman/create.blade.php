@extends('adminlte::page')

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Tambah Makluman</h3>

       
    </div>
    <div class="box-body">
        <form action="{{ route('makluman.store') }}" method="POST" class="col-lg-6" id="tempatForm">
            {{ csrf_field() }}

            <div class="form-group has-feedback {{ $errors->has('tajuk') ? 'has-error' : '' }}">

                <label for="tajuk">Tajuk</label>
                <input type="text" name="tajuk" class="form-control"
                    value="{{ old('tajuk') }}" />

                @if ($errors->has('tajuk'))
                <span class="help-block">
                    <strong>{{ ucwords($errors->first('tajuk')) }}</strong>
                </span>
                @endif

            </div>

            <div class="form-group has-feedback {{ $errors->has('keterangan') ? 'has-error' : '' }}">

                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control">{{ old('keterangan') }}</textarea>
                @if ($errors->has('keterangan'))
                <span class="help-block">
                    <strong>{{ ucwords($errors->first('keterangan')) }}</strong>
                </span>
                @endif

            </div>

        </form>           
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary" form="tempatForm">Simpan</button>
        <a href="{{ route('makluman.index') }}" class="btn btn-info">Kembali</a>

    </div>
    
</div>
@stop
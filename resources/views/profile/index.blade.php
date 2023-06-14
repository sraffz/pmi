@extends('adminlte::page')

@section('content_header')

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
  <h3 class="box-title">KEMASKINI PROFIL</h3>

  <div class="box-tools pull-right">
    
  </div>
  </div>
  <div class="box-body">
  <form action = "{{route('profile.update')}}" method = "post">    
    {{ method_field('PUT') }}
    {{ csrf_field() }} 

    <div class="form-group has-feedback {{ $errors->has('nama_penuh') ? 'has-error' : '' }}" >
    <label for="nama_penuh">Nama Penuh</label>
    <input type="text" name="nama_penuh" class="form-control" value="{{$profile->nama_penuh}}"/>
      @if ($errors->has('nama_penuh'))
      <span class="help-block">
      <strong>{{ ucwords($errors->first('nama_penuh')) }}</strong>
      </span>
    @endif
    </div>
    <div class="form-group has-feedback {{ $errors->has('nama_singkatan') ? 'has-error' : '' }}" >
    <label for="nama_singkatan">Nama Singkatan</label>
    <input type="text" name="nama_singkatan" class="form-control" value="{{$profile->nama_singkatan}}"/>
      @if ($errors->has('nama_singkatan'))
      <span class="help-block">
      <strong>{{ ucwords($errors->first('nama_singkatan')) }}</strong>
      </span>
    @endif
    </div>

    <div class="form-group" >
    <label for="no_kad_pengenalan">No. Kad Pengenalan</label>            
    <input type="text" class="form-control" value="{{$profile->no_kad_pengenalan}}" id="no_kad_pengenalan" disabled="disable" />
    
    </div>
      
    <div class="form-group has-feedback {{ $errors->has('no_telefon') ? 'has-error' : '' }}">
    <label for="no_telefon">No Telefon</label> 
    <input type="text" name="no_telefon" class="form-control" value="{{$profile->no_telefon}}"/>
    @if ($errors->has('no_telefon'))
    <span class="help-block">
    <strong>{{ ucwords($errors->first('no_telefon')) }}</strong>
    </span>
    @endif
    </div>

    <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email">Email</label> 
    <input type="text" name="email" class="form-control" value="{{$profile->email}}"/>
    @if ($errors->has('email'))
    <span class="help-block">
        <strong>{{ ucwords($errors->first('email')) }}</strong>
    </span>
    @endif
  </div>                           


  <div  class="form-group has-feedback {{ $errors->has('kategori') ? 'has-error' : '' }}"">     
    <label>Kategori Pengguna</label>
           <select name="kategori" id="kategori" class="form-control selectpicker">
                <option value="">--Pilih Kategori--</option>
                @foreach ($senaraiKategoriPengguna as $kategoriPengguna)
                    <option value="{{ $kategoriPengguna->id_kategori_pengguna }}" @if(old('kategori', $profile->kategori) == $kategoriPengguna->id_kategori_pengguna) selected @endif >{{ $kategoriPengguna->kategori }}</option>    
                @endforeach
          </select>
    @if ($errors->has('kategori'))
          <span class="help-block">
                <strong>{{ ucwords($errors->first('kategori')) }}</strong>
          </span>
    @endif
</div>    
                      
                      
    <div class="form-group has-feedback {{ $errors->has('no_telefon') ? 'has-error' : '' }}">
      <label for="alamat">Alamat</label> 
      <input type="text" name="alamat" class="form-control" value="{{$profile->alamat}}"/>
      @if ($errors->has('no_telefon'))
      <span class="help-block">
          <strong>{{ ucwords($errors->first('alamat')) }}</strong>
      </span>
      @endif
    </div>

    <input type="submit" name="kemaskini" class="btn btn-primary" value="Kemaskini">

                
            
  </form>

</div>
</div>
@endsection
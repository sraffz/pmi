@extends('adminlte::page')

@section('content')



    <div class="box box-primary">
        <div class="box-header with-border">
          
          <h3 class="box-title">MAKLUMAT PESERTA</h3>
        
        </div>
  
        <div class="box-body">

          <form action = "{{route('kehadiran.update', ['id' => $pengguna->id_pengguna])}}" method = "post">
            {{ method_field('put') }}
            {{ csrf_field() }}
            <div class="form-group has-feedback {{ $errors->has('nama_penuh') ? 'has-error' : '' }}">
            
              <label for="nama_penuh">Nama Peserta</label>
              <input type="text" id="nama_penuh" class="form-control" id="nama_penuh" placeholder="Password" name="nama_penuh" value = '{{ $pengguna->nama_penuh }}' />
              
              @if ($errors->has('nama_penuh'))
              <span class="help-block">
                  <strong>{{ ucwords($errors->first('nama_penuh')) }}</strong>
              </span>
              @endif

            </div>

            <div class="form-group has-feedback {{ $errors->has('no_kad_pengenalan') ? 'has-error' : '' }}">
            
                <label for="no_kad_pengenalan">No. Kad Pengenalan</label>
                <input type="text" id="no_kad_pengenalan" class="form-control" id="no_kad_pengenalan" name="no_kad_pengenalan" value = '{{ $pengguna->no_kad_pengenalan }}' />
                
                @if ($errors->has('no_kad_pengenalan'))
                <span class="help-block">
                <strong>{{ ucwords($errors->first('no_kad_pengenalan')) }}</strong>
                </span>
                @endif
            
            </div>

            <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
            
                <label for="email">Email</label>
                <input type="text" id="email" class="form-control" name="email" value = '{{ $pengguna->email }}' />
                
                @if ($errors->has('email'))
                <span class="help-block">
                <strong>{{ ucwords($errors->first('email')) }}</strong>
                </span>
                @endif
            
            </div>

            <div class="form-group has-feedback {{ $errors->has('no_telefon') ? 'has-error' : '' }}">
            
            <label for="no_telefon">No. Telefon</label>
            <input type="text" id="no_telefon" class="form-control" name="no_telefon" value = '{{ $pengguna->no_telefon }}' />
            
            @if ($errors->has('no_telefon'))
            <span class="help-block">
            <strong>{{ ucwords($errors->first('no_telefon')) }}</strong>
            </span>
            @endif
        
            </div>

            <div  class="form-group has-feedback {{ $errors->has('kategori') ? 'has-error' : '' }}"">     
              <label>Kategori Pengguna</label>
                     <select name="kategori" id="kategori" class="form-control selectpicker">
                          <option value="">--Pilih Kategori--</option>
                          <option value="1" @if(old('kategori', $pengguna->kategori) == 1) selected @endif>Kerajaan</option>
                          <option value="2" @if(old('kategori', $pengguna->kategori) == 2) selected @endif>Swasta</option>
                          <option value="3" @if(old('kategori', $pengguna->kategori) == 3) selected @endif>Lain-lain</option>
                    </select>
              @if ($errors->has('kategori'))
                    <span class="help-block">
                          <strong>{{ ucwords($errors->first('kategori')) }}</strong>
                    </span>
              @endif
          </div> 

            <div class="form-group has-feedback {{ $errors->has('alamat') ? 'has-error' : '' }}">
            
              <label for="alamat">Alamat</label>
              <input type="text" id="alamat" class="form-control" name="alamat" value = '{{ $pengguna->alamat }}' />
              
              @if ($errors->has('alamat'))
              <span class="help-block">
              <strong>{{ ucwords($errors->first('alamat')) }}</strong>
              </span>
              @endif
          
            </div>

          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Kemaskini</button>
          </div>
        </form>

        </div>
    </div>


@stop
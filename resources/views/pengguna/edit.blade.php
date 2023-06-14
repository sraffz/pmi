@extends('adminlte::page')

@section('content')




<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Kemaskini Pengguna</h3>

      </div>

      <div class="box-body">

        <form action="{{route('pengguna.update', ['id' => $pengguna->id_pengguna])}}" method="POST" class="col-lg-6">
            {{ method_field('put') }}
            {{ csrf_field() }}

            <input type="hidden" name="id" value="{{ $pengguna->id_pengguna }}">
                          
              <div class="form-group has-feedback {{ $errors->has('nama_penuh') ? 'has-error' : '' }}"> 
                    <label>Nama Penuh</label>
                    <input type="text" name="nama_penuh" id="nama_penuh" class="form-control" title="Masukkan nama penuh" value="{{ old('nama_penuh', $pengguna->nama_penuh) }}" >
                    @if ($errors->has('nama_penuh'))
                          <span class="help-block">
                                <strong>{{ ucwords($errors->first('nama_penuh')) }}</strong>
                          </span>
                     @endif
              </div>
                                  
                                  
              <div  class="form-group has-feedback {{ $errors->has('nama_singkatan') ? 'has-error' : '' }}">         
                    <label>Nama Singkatan</label>
                    <input type="text" name="nama_singkatan" id="nama_singkatan" class="form-control"  title="Masukkan singkatan" value="{{ old('nama_singkatan', $pengguna->nama_singkatan) }}"  >
                    @if ($errors->has('nama_singkatan'))
                          <span class="help-block">
                                <strong>{{ ucwords($errors->first('nama_singkatan')) }}</strong>
                          </span>
                     @endif
              </div>  
  
              <div class="form-group has-feedback {{ $errors->has('no_kad_pengenalan') ? 'has-error' : '' }}">
                    <label >Nombor Kad Pengenalan</label>
                    <input type="number" name="no_kad_pengenalan" id="no_kad_pengenalan" value="{{ old('no_kad_pengenalan', $pengguna->no_kad_pengenalan) }}" class="form-control" title="Masukkan 12 Angka Nombor"    >
                    @if ($errors->has('no_kad_pengenalan'))
                          <span class="help-block">
                                <strong>{{ ucwords($errors->first('no_kad_pengenalan')) }}</strong>
                          </span>
                     @endif
                    </div>                

                                     
              <div  class="form-group has-feedback {{ $errors->has('kategori') ? 'has-error' : '' }}"">     
                    <label>Kategori Pengguna</label>
                           <select name="kategori" id="kategori" class="form-control selectpicker">
                                <option value="">--Pilih Kategori--</option>
                                @foreach ($senaraiKategoriPengguna as $kategoriPengguna)
                                    <option value="{{ $kategoriPengguna->id_kategori_pengguna }}" @if(old('kategori', $pengguna->kategori) == $kategoriPengguna->id_kategori_pengguna) selected @endif >{{ $kategoriPengguna->kategori }}</option>    
                                @endforeach
                          </select>
                    @if ($errors->has('kategori'))
                          <span class="help-block">
                                <strong>{{ ucwords($errors->first('kategori')) }}</strong>
                          </span>
                    @endif
              </div>    
                                    

               <div  class="form-group has-feedback {{ $errors->has('alamat') ? 'has-error' : '' }}">  
                    <label >Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" title="Masukkan alamat" value="{{ old('alamat', $pengguna->alamat) }}" >
                    @if ($errors->has('alamat'))
                          <span class="help-block">
                                <strong>{{ ucwords($errors->first('alamat')) }}</strong>
                          </span>
                          @endif
              </div>   
                                  

              <div class="form-group has-feedback {{ $errors->has('no_telefon') ? 'has-error' : '' }}">
                    <label >Nombor Telefon</label>
                    <input type="number" name="no_telefon" id="no_telefon"  class="form-control" value="{{ old('no_telefon', $pengguna->no_telefon) }}"  title="Masukkan nombor telefon" >
                    @if ($errors->has('no_telefon'))
                          <span class="help-block">
                                <strong>{{ ucwords($errors->first('no_telefon')) }}</strong>
                          </span>
                          @endif
              </div>  
                                                                          
              <div  class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">   
                    <label >E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $pengguna->email) }}" >
                    @if ($errors->has('email'))
                    <span class="help-block">
                          <strong>{{ ucwords($errors->first('email')) }}</strong>
                   </span>
                    @endif
              </div>  
                                  
            @role('superadmin')

                <div  class="form-group has-feedback {{ $errors->has('status_aktif') ? 'has-error' : '' }}"">     
                    <label>Status Aktif</label>
                        <select name="status_aktif" id="status_aktif" class="form-control selectpicker">
                                <option value="1" @if(old('status_aktif', $pengguna->status_aktif) == 1) selected @endif>Aktif</option>
                                <option value="0" @if(old('status_aktif', $pengguna->status_aktif) == 2) selected @endif>Tidak Aktif</option>
                        </select>
                    @if ($errors->has('status_aktif'))
                        <span class="help-block">
                                <strong>{{ ucwords($errors->first('status_aktif')) }}</strong>
                        </span>
                    @endif
            </div>

              <div  class="form-group">   
                    <label >Jenis Pengguna</label> <br>
                    
                        <input type="checkbox" id="admin" name="tahap[]" value="superadmin" @if($pengguna->hasRole('superadmin')) checked @endif> Admin <br>
                        <input type="checkbox" id="pengurusan" name="tahap[]" value="pengurusan" @if($pengguna->hasRole('pengurusan')) checked @endif> Pengurusan <br>
                        <input type="checkbox" id="urus setia" name="tahap[]" value="urusetia" @if($pengguna->hasRole('urusetia')) checked @endif> Urusetia <br>
                        <input  type="checkbox" id="individu" name="tahap[]" value="individu" @if($pengguna->hasRole('individu')) checked @endif> Individu 
                    
              </div> 
               @endrole
                                                                         
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="{{ route('senarai.pengguna') }}" class="btn btn-info">Kembali</a>
        </form>
</div>

</div>

@stop
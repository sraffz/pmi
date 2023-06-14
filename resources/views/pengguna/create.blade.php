@extends('adminlte::page')

@section('content_header')

@stop


@section('content')

<div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Pengguna</h3>

      	</div>

      	<div class="box-body">

            <form action="{{route('pengguna.store')}}" method="POST" class="col-lg-6">
                {{ csrf_field() }}
                              
                  <div class="form-group has-feedback {{ $errors->has('nama_penuh') ? 'has-error' : '' }}"> 
                        <label>Nama Penuh</label>
                        <input type="text" name="nama_penuh" id="nama_penuh" class="form-control" title="Masukkan nama penuh" value="{{ old('nama_penuh') }}" required>
                        @if ($errors->has('nama_penuh'))
                              <span class="help-block">
                                    <strong>{{ ucwords($errors->first('nama_penuh')) }}</strong>
                              </span>
                         @endif
                  </div>
                                      
                                      
                  <div  class="form-group has-feedback {{ $errors->has('nama_singkatan') ? 'has-error' : '' }}">         
                        <label>Nama Singkatan</label>
                        <input type="text" name="nama_singkatan" id="nama" class="form-control"  title="Masukkan singkatan" value="{{ old('nama_singkatan') }}" required >
                        @if ($errors->has('nama_singkatan'))
                              <span class="help-block">
                                    <strong>{{ ucwords($errors->first('nama_singkatan')) }}</strong>
                              </span>
                         @endif
                  </div>  
      
                  <div class="form-group has-feedback {{ $errors->has('no_kad_pengenalan') ? 'has-error' : '' }}">
                        <label >Nombor Kad Pengenalan</label>
                        <input type="number" name="no_kad_pengenalan" value="{{old('no_kad_pengenalan')}}" id="no_kad_pengenalan" class="form-control"  placeholder="Cth: 850989149900"  title="Masukkan 12 Angka Nombor" required >
                        @if ($errors->has('no_kad_pengenalan'))
                              <span class="help-block">
                                    <strong>{{ ucwords($errors->first('no_kad_pengenalan')) }}</strong>
                              </span>
                         @endif
                        </div>  
                                      
                  <div class="form-group has-feedback {{ $errors->has('katalaluan') ? 'has-error' : '' }}">
                        <label >Kata Laluan</label>
                        <input type="password" name="katalaluan" id="katalaluan" class="form-control"  title="Masukkan sekurang-kurangnya satu huruf BESAR, satu huruf kecil, satu nombor dan minimum 8 karakter" required>
                        @if ($errors->has('katalaluan'))
                              <span class="help-block">
                                    <strong>{{ ucwords($errors->first('katalaluan')) }}</strong>
                              </span>
                        @endif
                  </div>  
                                      
                                      
                                      
                  <div  class="form-group"> 
                        <label >Pengesahan Kata Laluan</label>
                        <input type="password" name="katalaluan_confirmation" id="katalaluan_confirmation" class="form-control" placeholder="Masukkan Semula Katalaluan" title="Masukkan semula katalaluan">
                  </div>

                                         
                  <div  class="form-group has-feedback {{ $errors->has('kategori') ? 'has-error' : '' }}">     
                        <label>Kategori Pengguna</label>
                               <select name="kategori" id="kategori" class="form-control selectpicker">
                                    <option value="">--Pilih Kategori--</option>
                                    @foreach ($senaraiKategoriPengguna as $kategoriPengguna)
                                          <option value="{{ $kategoriPengguna->id_kategori_pengguna }}" @if(old('kategori') == $kategoriPengguna->id_kategori_pengguna) selected @endif >{{ $kategoriPengguna->kategori }}</option>    
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
                        <input type="text" name="alamat" id="alamat" class="form-control" title="Masukkan alamat" value="{{ old('alamat') }}">
                        @if ($errors->has('alamat'))
                              <span class="help-block">
                                    <strong>{{ ucwords($errors->first('alamat')) }}</strong>
                              </span>
                              @endif
                  </div>   
                                      

                  <div class="form-group has-feedback {{ $errors->has('no_telefon') ? 'has-error' : '' }}">
                        <label >Nombor Telefon</label>
                        <input type="number" name="no_telefon" value="{{old('no_telefon')}}" id="no_telefon"  class="form-control" value="{{ old('no_telefon') }}"  title="Masukkan nombor telefon">
                        @if ($errors->has('no_telefon'))
                              <span class="help-block">
                                    <strong>{{ ucwords($errors->first('no_telefon')) }}</strong>
                              </span>
                              @endif
                  </div>  
                                                                              
                  <div  class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">   
                        <label >E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                        <span class="help-block">
                              <strong>{{ ucwords($errors->first('email')) }}</strong>
                       </span>
                        @endif
                  </div>  
                                      
					@role('superadmin')
                  <div  class="form-group">   
                        <label >Jenis Pengguna</label> <br>
						
							<input type="checkbox" id="admin" name="tahap[]" value="superadmin"> Admin <br>
							<input type="checkbox" id="pengurusan" name="tahap[]" value="pengurusan"> Pengurusan <br>
							<input type="checkbox" id="urus setia" name="tahap[]" value="urusetia"> Urus Setia <br>
							<input  type="checkbox" id="individu" name="tahap[]" value="individu"> Individu 
						
                  </div> 
				   @endrole
                                                                             
				  	@role(['urusetia', 'individu'])
						<input type="hidden" name="tahap[]" value="individu">
					@endrole
                                    
                                      
                  <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
    </div>

	</div>




@endsection
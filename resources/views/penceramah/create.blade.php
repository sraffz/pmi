@extends('adminlte::page')
@section('content')

      

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Penceramah</h3>
       
              
                    <div class="box-body">
                      <form action = "{{ route('penceramah.store') }}" method = "post">
                        {{ csrf_field() }}

                      <div class="form-group  has-feedback {{ $errors->has('nama_penceramah') ? 'has-error' : '' }} ">
                        <label for="nama_penceramah">Nama Penceramah</label>
                          <input type='text' class="form-control" id="nama_penceramah" placeholder="Masukkan Nama Penceramah " name='nama_penceramah' value="{{old('nama_penceramah')}}">
                          @if ($errors->has('nama_penceramah'))
                          <span class="help-block">
                              <strong>{{ ucwords($errors->first('nama_penceramah')) }}</strong>
                          </span>
                        @endif
                      </div>

                     <div class="form-group has-feedback {{ $errors->has('no_kad_pengenalan') ? 'has-error' : '' }}">
                        <label for="no_kad_pengenalan">No. Kad Pengenalan</label>
                          <input type='number' class="form-control" id="no_kad_pengenalan" placeholder="Masukkan Kad Pengenalan " name='no_kad_pengenalan' value="{{old('no_kad_pengenalan')}}">
                          @if ($errors->has('no_kad_pengenalan'))
                            <span class="help-block">
                                <strong>{{ ucwords($errors->first('no_kad_pengenalan')) }}</strong>
                            </span>
                          @endif
                    </div>  

                    <div class="form-group  has-feedback {{ $errors->has('no_telefon') ? 'has-error' : '' }} ">
                        <label for="no_telefon">Nombor Telefon</label>
                          <input type='number' class="form-control" id="no_telefon" placeholder="Masukkan Nombor Telefon " name='no_telefon' value="{{old('no_telefon')}}">
                          @if ($errors->has('no_telefon'))
                            <span class="help-block">
                                <strong>{{ ucwords($errors->first('no_telefon')) }}</strong>
                            </span>
                          @endif
                    </div>

                    <div class="form-group  has-feedback {{ $errors->has('no_akaun_bank') ? 'has-error' : '' }} ">
                        <label for="no_akaun_bank">No Akaun Bank</label>
                          <input type='number' class="form-control" id="no_akaun_bank" placeholder="Masukkan No Akaun Bank " name='no_akaun_bank' value="{{old('no_akaun_bank')}}">
                          @if ($errors->has('no_akaun_bank'))
                            <span class="help-block">
                                <strong>{{ ucwords($errors->first('no_akaun_bank')) }}</strong>
                            </span>
                          @endif
                    </div>

                    <div class="form-group  has-feedback {{ $errors->has('alamat1') ? 'has-error' : '' }} ">
                        <label for="alamat1">Alamat 1</label>
                         <input type='text' class="form-control" id="alamat1" placeholder="Masukkan Alamat1 " name='alamat1' value="{{old('alamat1')}}">
                         @if ($errors->has('alamat1'))
                         <span class="help-block">
                             <strong>{{ ucwords($errors->first('alamat1')) }}</strong>
                         </span>
                       @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('alamat2') ? 'has-error' : '' }}">
                        <label for="alamat2">Alamat 2</label>
                          <input type='text' class="form-control" id="alamat2" placeholder="Masukkan Alamat2 " name='alamat2'value="{{old('alamat2')}}">
                          @if ($errors->has('alamat2'))
                         <span class="help-block">
                             <strong>{{ ucwords($errors->first('alamat2')) }}</strong>
                         </span>
                       @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('alamat3') ? 'has-error' : '' }}">
                        <label for="alamat3">Alamat 3</label>
                          <input type='text' class="form-control" id="alamat3" placeholder="Masukkan Alamat3 " name='alamat3'value="{{old('alamat3')}}">
                          @if ($errors->has('alamat3'))
                         <span class="help-block">
                             <strong>{{ ucwords($errors->first('alamat3')) }}</strong>
                         </span>
                       @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('poskod') ? 'has-error' : '' }}">
                        <label for="poskod">Poskod</label>
                          <input type='text' class="form-control" id="poskod" placeholder="Masukkan Poskod " name='poskod'value="{{old('poskod')}}">
                          @if ($errors->has('poskod'))
                          <span class="help-block">
                              <strong>{{ ucwords($errors->first('poskod')) }}</strong>
                          </span>
                        @endif
                    </div>

                    <div class="form-group  has-feedback {{ $errors->has('bandar') ? 'has-error' : '' }}">
                        <label for="bandar">Bandar</label>
                          <input type='text' class="form-control" id="bandar" placeholder="Masukkan Bandar " name='bandar'value="{{old('bandar')}}">
                          @if ($errors->has('bandar'))
                          <span class="help-block">
                              <strong>{{ ucwords($errors->first('bandar')) }}</strong>
                          </span>
                        @endif
                          
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('negeri') ? 'has-error' : '' }}">
                        <label for="negeri">Negeri</label>
                          <input type='text' class="form-control" id="negeri" placeholder="Masukkan Negeri " name='negeri'value="{{old('negeri')}}">
                          @if ($errors->has('negeri'))
                          <span class="help-block">
                              <strong>{{ ucwords($errors->first('negeri')) }}</strong>
                          </span>
                        @endif
                    </div>

                
                    <button type="submit" class="btn bg-primary" class="form-control">Simpan</button>
                       

                  </form>
                    </div>
            </div>

             
                        
@stop
                        
                    
                    
                   


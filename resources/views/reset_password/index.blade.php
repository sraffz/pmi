@extends('adminlte::page')

@section('content_header')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Tukar Katalaluan</h3>

      </div>

      <div class="box-body">

        <form action="{{route('pengguna.tukar-katalaluan')}}" method="POST" class="col-lg-6">
            {{ csrf_field() }}
                          
              
                                  
              <div class="form-group has-feedback {{ $errors->has('katalaluan_semasa') ? 'has-error' : '' }}">
                    <label >Katalaluan Semasa</label>
                    <input type="password" name="katalaluan_semasa" id="katalaluan_semasa" class="form-control" >
                    @if ($errors->has('katalaluan_semasa'))
                          <span class="help-block">
                                <strong>{{ ucwords($errors->first('katalaluan_semasa')) }}</strong>
                          </span>
                    @endif
              </div>  
                                  
              <div class="form-group has-feedback {{ $errors->has('katalaluan') ? 'has-error' : '' }}">
                    <label >Katalaluan Baru</label>
                    <input type="password" name="katalaluan" id="katalaluan" class="form-control"  title="Masukkan sekurang-kurangnya satu huruf BESAR, satu huruf kecil, satu nombor dan minimum 12 karakter" >
                    @if ($errors->has('katalaluan'))
                          <span class="help-block">
                                <strong>{{ ucwords($errors->first('katalaluan')) }}</strong>
                          </span>
                    @endif
              </div>                
                                  
                                  
              <div  class="form-group"> 
                    <label >Pengesahan Kata Laluan Baru</label>
                    <input type="password" name="katalaluan_confirmation" id="katalaluan_confirmation" class="form-control" placeholder="Masukkan Semula Katalaluan" title="Masukkan semula katalaluan">
              </div>                      
                                  
              <button type="submit" class="btn btn-primary">Simpan</button>

        </form>
    </div>

</div>

@endsection
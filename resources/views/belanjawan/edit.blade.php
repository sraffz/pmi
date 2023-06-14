@extends('adminlte::page')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Maklumat Belanjawan</h3>
          </div>
        
        <div class="box-body">
         <form action="{{route('belanjawan.update', ['id'=> $belanjawan->id_belanjawan])}}" method="post" id="belanjawanForm" class="col-xs-12 col-md-6">
                {{ method_field('put') }}
                {{ csrf_field() }}

                <label for=""><span style="font-size: 1.2em; color: blue">Makanan</span></label>

                <div class="row">
                    <div class="col-md-4">
                    <div class="form-group has-feedback {{ $errors->has('bayaran_makanan') ? 'has-error' : '' }}">

                        <label for="bayaran_makanan">Bayaran (RM)</label>
                        <input type="number" name="bayaran_makanan" class="form-control" step="any"
                            value="{{ old('bayaran_makanan', $belanjawan->bayaran_makanan)  }}" />

                        @if ($errors->has('bayaran_makanan'))
                        <span class="help-block">
                            <strong>{{ ucwords($errors->first('bayaran_makanan')) }}</strong>
                        </span>
                        @endif

                    </div>    
                    </div>
                    <div class="col-md-8">
                     <div class="form-group has-feedback {{ $errors->has('butiran_makanan') ? 'has-error' : '' }}">

                        <label for="butiran_makanan">Butiran</label>
                        <input type="text" name="butiran_makanan" class="form-control"
                            value="{{ old('butiran_makanan', $belanjawan->butiran_makanan) }}" />

                        @if ($errors->has('butiran_makanan'))
                        <span class="help-block">
                            <strong>{{ ucwords($errors->first('butiran_makanan')) }}</strong>
                        </span>
                        @endif

                    </div>   
                    </div>
                </div>
            
                <label for=""><span style="font-size: 1.2em; color: blue">Cenderahati</span></label>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group has-feedback {{ $errors->has('bayaran_cenderahati') ? 'has-error' : '' }}">

                            <label for="bayaran_cenderahati">Bayaran (RM)</label>
                            <input type="number" name="bayaran_cenderahati" class="form-control" step="any"
                                value="{{ old('bayaran_cenderahati', $belanjawan->bayaran_cenderahati) }}" />
        
                            @if ($errors->has('bayaran_cenderahati'))
                            <span class="help-block">
                                <strong>{{ ucwords($errors->first('bayaran_cenderahati')) }}</strong>
                            </span>
                            @endif
        
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group has-feedback {{ $errors->has('butiran_cenderahati') ? 'has-error' : '' }}">

                            <label for="butiran_cenderahati">Butiran</label>
                            <input type="text" name="butiran_cenderahati" class="form-control"
                                value="{{ old('butiran_cenderahati', $belanjawan->butiran_cenderahati) }}" />
        
                            @if ($errors->has('butiran_cenderahati'))
                            <span class="help-block">
                                <strong>{{ ucwords($errors->first('butiran_cenderahati')) }}</strong>
                            </span>
                            @endif
        
                        </div>
                    </div>
                </div>
                

                

                
                
                <label for=""><span style="font-size: 1.2em; color: blue">Penceramah</span></label>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group has-feedback {{ $errors->has('bayaran_penceramah') ? 'has-error' : '' }}">

                            <label for="bayaran_penceramah">Bayaran (RM)</label>
                            <input type="number" name="bayaran_penceramah" class="form-control" step="any"
                                value="{{ old('bayaran_penceramah', $belanjawan->bayaran_penceramah) }}" />
        
                            @if ($errors->has('bayaran_penceramah'))
                            <span class="help-block">
                                <strong>{{ ucwords($errors->first('bayaran_penceramah')) }}</strong>
                            </span>
                            @endif
        
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group has-feedback {{ $errors->has('butiran_penceramah') ? 'has-error' : '' }}">

                            <label for="butiran_penceramah">Butiran</label>
                            <input type="text" name="butiran_penceramah" class="form-control"
                                value="{{ old('butiran_penceramah', $belanjawan->butiran_penceramah) }}" />
        
                            @if ($errors->has('butiran_penceramah'))
                            <span class="help-block">
                                <strong>{{ ucwords($errors->first('butiran_penceramah')) }}</strong>
                            </span>
                            @endif
        
                        </div>
                    </div>
                </div>

                

                

                <label for=""><span style="font-size: 1.2em; color: blue">Fasilitator</span></label>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group has-feedback {{ $errors->has('bayaran_fasilitator') ? 'has-error' : '' }}">

                            <label for="bayaran_fasilitator">Bayaran (RM)</label>
                            <input type="number" name="bayaran_fasilitator" class="form-control" step="any"
                                value="{{ old('bayaran_fasilitator', $belanjawan->bayaran_fasilitator) }}" />
        
                            @if ($errors->has('bayaran_fasilitator'))
                            <span class="help-block">
                                <strong>{{ ucwords($errors->first('bayaran_fasilitator')) }}</strong>
                            </span>
                            @endif
        
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group has-feedback {{ $errors->has('butiran_fasilitator') ? 'has-error' : '' }}">

                            <label for="butiran_fasilitator">Butiran</label>
                            <input type="text" name="butiran_fasilitator" class="form-control"
                                value="{{ old('butiran_fasilitator', $belanjawan->butiran_fasilitator) }}" />
        
                            @if ($errors->has('butiran_fasilitator'))
                            <span class="help-block">
                                <strong>{{ ucwords($errors->first('butiran_fasilitator')) }}</strong>
                            </span>
                            @endif
        
                        </div>
                    </div>
                </div>

                

                

                <label for=""><span style="font-size: 1.2em; color: blue">Penginapan</span></label>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group has-feedback {{ $errors->has('bayaran_penginapan') ? 'has-error' : '' }}">

                            <label for="bayaran_penginapan">Bayaran (RM)</label>
                            <input type="number" name="bayaran_penginapan" class="form-control" step="any"
                                value="{{ old('bayaran_penginapan', $belanjawan->bayaran_penginapan) }}" />
        
                            @if ($errors->has('bayaran_penginapan'))
                            <span class="help-block">
                                <strong>{{ ucwords($errors->first('bayaran_penginapan')) }}</strong>
                            </span>
                            @endif
        
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group has-feedback {{ $errors->has('butiran_penginapan') ? 'has-error' : '' }}">

                            <label for="butiran_penginapan">Butiran</label>
                            <input type="text" name="butiran_penginapan" class="form-control"
                                value="{{ old('butiran_penginapan', $belanjawan->butiran_penginapan) }}" />
        
                            @if ($errors->has('butiran_penginapan'))
                            <span class="help-block">
                                <strong>{{ ucwords($errors->first('butiran_penginapan')) }}</strong>
                            </span>
                            @endif
        
                        </div>
                    </div>
                </div>

                

                

                <label for=""><span style="font-size: 1.2em; color: blue">Tempat</span></label>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group has-feedback {{ $errors->has('bayaran_tempat') ? 'has-error' : '' }}">

                            <label for="bayaran_tempat">Bayaran (RM)</label>
                            <input type="number" name="bayaran_tempat" class="form-control" step="any"
                                value="{{ old('bayaran_tempat', $belanjawan->bayaran_tempat) }}" />
        
                            @if ($errors->has('bayaran_tempat'))
                            <span class="help-block">
                                <strong>{{ ucwords($errors->first('bayaran_tempat')) }}</strong>
                            </span>
                            @endif
        
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group has-feedback {{ $errors->has('butiran_tempat') ? 'has-error' : '' }}">

                            <label for="butiran_tempat">Butiran</label>
                            <input type="text" name="butiran_tempat" class="form-control"
                                value="{{ old('butiran_tempat', $belanjawan->butiran_tempat) }}" />
        
                            @if ($errors->has('butiran_tempat'))
                            <span class="help-block">
                                <strong>{{ ucwords($errors->first('butiran_tempat')) }}</strong>
                            </span>
                            @endif
        
                        </div>
                    </div>
                </div>

                

                

                <label for=""><span style="font-size: 1.2em; color: blue">Tiket</span></label>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group has-feedback {{ $errors->has('bayaran_tiket') ? 'has-error' : '' }}">

                            <label for="bayaran_tiket">Bayaran (RM)</label>
                            <input type="number" name="bayaran_tiket" class="form-control" step="any"
                                value="{{ old('bayaran_tiket', $belanjawan->bayaran_tiket) }}" />
        
                            @if ($errors->has('bayaran_tiket'))
                            <span class="help-block">
                                <strong>{{ ucwords($errors->first('bayaran_tiket')) }}</strong>
                            </span>
                            @endif
        
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group has-feedback {{ $errors->has('butiran_tiket') ? 'has-error' : '' }}">

                            <label for="butiran_tiket">Butiran</label>
                            <input type="text" name="butiran_tiket" class="form-control"
                                value="{{ old('butiran_tiket', $belanjawan->butiran_tiket) }}" />
        
                            @if ($errors->has('butiran_tiket'))
                            <span class="help-block">
                                <strong>{{ ucwords($errors->first('butiran_tiket')) }}</strong>
                            </span>
                            @endif
        
                        </div>
                    </div>
                </div>

                

                

                <label for=""><span style="font-size: 1.2em; color: blue">Sijil</span></label>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group has-feedback {{ $errors->has('bayaran_sijil') ? 'has-error' : '' }}">

                            <label for="bayaran_sijil">Bayaran (RM)</label>
                            <input type="number" name="bayaran_sijil" class="form-control" step="any"
                                value="{{ old('bayaran_sijil', $belanjawan->bayaran_sijil) }}" />
        
                            @if ($errors->has('bayaran_sijil'))
                            <span class="help-block">
                                <strong>{{ ucwords($errors->first('bayaran_sijil')) }}</strong>
                            </span>
                            @endif
        
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group has-feedback {{ $errors->has('butiran_sijil') ? 'has-error' : '' }}">

                            <label for="butiran_sijil">Butiran</label>
                            <input type="text" name="butiran_sijil" class="form-control"
                                value="{{ old('butiran_sijil', $belanjawan->butiran_sijil) }}" />
        
                            @if ($errors->has('butiran_sijil'))
                            <span class="help-block">
                                <strong>{{ ucwords($errors->first('butiran_sijil')) }}</strong>
                            </span>
                            @endif
        
                        </div>
                    </div>
                </div>

                

                

                <label for=""><span style="font-size: 1.2em; color: blue">Backdrop</span></label>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group has-feedback {{ $errors->has('bayaran_tiraiBelakang') ? 'has-error' : '' }}">

                            <label for="bayaran_tiraiBelakang">Bayaran (RM)</label>
                            <input type="number" name="bayaran_tiraiBelakang" class="form-control" step="any"
                                value="{{ old('bayaran_tiraiBelakang', $belanjawan->bayaran_tiraiBelakang) }}" />
        
                            @if ($errors->has('bayaran_tiraiBelakang'))
                            <span class="help-block">
                                <strong>{{ ucwords($errors->first('bayaran_tiraiBelakang')) }}</strong>
                            </span>
                            @endif
        
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group has-feedback {{ $errors->has('butiran_tiraiBelakang') ? 'has-error' : '' }}">

                            <label for="butiran_tiraiBelakang">Butiran</label>
                            <input type="text" name="butiran_tiraiBelakang" class="form-control"
                                value="{{ old('butiran_tiraiBelakang', $belanjawan->butiran_tiraiBelakang) }}" />
        
                            @if ($errors->has('butiran_tiraiBelakang'))
                            <span class="help-block">
                                <strong>{{ ucwords($errors->first('butiran_tiraiBelakang')) }}</strong>
                            </span>
                            @endif
        
                        </div>
                    </div>
                </div>
                

                <label for=""><span style="font-size: 1.2em; color: blue">Lain lain</span></label>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group has-feedback {{ $errors->has('bayaran_lain') ? 'has-error' : '' }}">

                            <label for="bayaran_lain">Bayaran (RM)</label>
                            <input type="number" name="bayaran_lain" class="form-control" step="any"
                                value="{{ old('bayaran_lain', $belanjawan->bayaran_lain) }}" />
        
                            @if ($errors->has('bayaran_lain'))
                            <span class="help-block">
                                <strong>{{ ucwords($errors->first('bayaran_lain')) }}</strong>
                            </span>
                            @endif
        
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group has-feedback {{ $errors->has('butiran_lain') ? 'has-error' : '' }}">

                            <label for="butiran_lain">Butiran</label>
                            <input type="text" name="butiran_lain" class="form-control"
                                value="{{ old('butiran_lain', $belanjawan->butiran_lain) }}" />
        
                            @if ($errors->has('butiran_lain'))
                            <span class="help-block">
                                <strong>{{ ucwords($errors->first('butiran_lain')) }}</strong>
                            </span>
                            @endif
        
                        </div>
                    </div>
                </div>

                

                

            </form> 
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary" form="belanjawanForm">Simpan</button>
            <a href="{{ route('program.belanjawan', ['id' => $belanjawan->id_belanjawan]) }}" class="btn btn-info">Kembali</a>

        </div>
      </div>
</section>
            

            
                        
@stop
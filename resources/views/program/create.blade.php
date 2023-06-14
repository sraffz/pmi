@extends('adminlte::page')
@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <center><h3 class="box-title"><b>TAMBAH PROGRAM</b></h3></center>


    </div>
    <div class="box-body">
        <form action="{{ route('program.store') }}" method="post" id="tambahProgramForm" enctype="multipart/form-data">
                {{ csrf_field() }}

                
                <div  class="form-group has-feedback {{ $errors->has('poster_program') ? 'has-error' : '' }}">
                        <label for="poster_program">Poster Program</label>
                        <input type="file" name="poster_program" class="form-control">
                        @if ($errors->has('poster_program'))
                            <span class="help-block">
                            <strong>{{ ucwords($errors->first('poster_program')) }}</strong>
                            </span>
                        @endif
                </div>    
                


                
                <div  class="form-group has-feedback {{ $errors->has('nama_program') ? 'has-error' : '' }}">    
                        <label for="nama_program">Nama Program</label>
                        <input type="text" name="nama_program" class="form-control" value="{{ old('nama_program') }}">
                        @if ($errors->has('nama_program'))
                            <span class="help-block">
                            <strong>{{ ucwords($errors->first('nama_program')) }}</strong>
                            </span>
                        @endif
                </div>

                <div  class="form-group has-feedback {{ $errors->has('anjuran') ? 'has-error' : '' }}">    
                        <label for="anjuran">Pengendali Program (cth: Bahagian Pengurusan Teknologi Maklumat)</label>
                        <input type="text" name="anjuran" class="form-control" value="{{ old('anjuran') }}">
                        @if ($errors->has('anjuran'))
                            <span class="help-block">
                            <strong>{{ ucwords($errors->first('anjuran')) }}</strong>
                            </span>
                        @endif
                </div>
                
                <div  class="form-group has-feedback {{ $errors->has('deskripsi_program') ? 'has-error' : '' }}">
                        <label for="deskripsi_program"> Deskripsi Program</label>
                        <textarea name="deskripsi_program" class="form-control" rows="10" cols="30">{{ old('deskripsi_program') }}</textarea>
                        @if ($errors->has('deskripsi_program'))
                            <span class="help-block">
                            <strong>{{ ucwords($errors->first('deskripsi_program')) }}</strong>
                            </span>
                        @endif
                </div> 
                    
                

                
                <div  class="form-group has-feedback {{ $errors->has('jenis_program') ? 'has-error' : '' }}">
                        <label for="jenis_program'">Jenis Program</label>
                        <select name="jenis_program" class="form-control selectpicker">
                            <option value="">--Pilih Jenis Program--</option>
                            <option value="Bengkel" @if(old('jenis_program') == 'Bengkel') selected @endif>Bengkel</option>
                            <option value="Ceramah" @if(old('jenis_program') == 'Ceramah') selected @endif>Ceramah</option>
                            <option value="Karnival" @if(old('jenis_program') == 'Karnival') selected @endif>Karnival</option>
                            <option value="Kursus" @if(old('jenis_program') == 'Kursus') selected @endif>Kursus</option>
                            <option value="Mesyuarat" @if(old('jenis_program') == 'Mesyuarat') selected @endif>Mesyuarat</option>
                            <option value="Pertandingan" @if(old('jenis_program') == 'Pertandingan') selected @endif>Pertandingan</option>
                            <option value="Seminar" @if(old('jenis_program') == 'Seminar') selected @endif>Seminar</option>
                        </select>
                        @if ($errors->has('jenis_program'))
                            <span class="help-block">
                            <strong>{{ ucwords($errors->first('jenis_program')) }}</strong>
                            </span>
                        @endif
                </div> 
                

                
                <div  class="form-group has-feedback {{ $errors->has('tarikh_mula') ? 'has-error' : '' }}">
                        <label for="tarikh_mula">Tarikh Mula</label>
                        <input type="date" name="tarikh_mula" class="form-control" placeholder="Tarikh Mula"  value="{{ old('tarikh_mula') }}">
                        @if ($errors->has('tarikh_mula'))
                            <span class="help-block">
                            <strong>{{ ucwords($errors->first('tarikh_mula')) }}</strong>
                            </span>
                        @endif
                </div> 
                

                
                <div  class="form-group has-feedback {{ $errors->has('tarikh_akhir') ? 'has-error' : '' }}">
                        <label for="tarikh_akhir">Tarikh Akhir</label>
                        <input type="date" name="tarikh_akhir" class="form-control" placeholder="Tarikh Akhir" value="{{ old('tarikh_akhir') }}">
                        @if ($errors->has('tarikh_akhir'))
                            <span class="help-block">
                            <strong>{{ ucwords($errors->first('tarikh_akhir')) }}</strong>
                            </span>
                        @endif
                </div>     
          
                <div  class="form-group has-feedback {{ $errors->has('tempat') ? 'has-error' : '' }}">
                        <label for="tempat">Tempat</label>
                        <select name="tempat" id="tempat" class="form-control selectpicker">
                            <option value>--Pilih Tempat--</option>
                            @foreach ($senaraiTempat as $tempat)
                            <option value="{{ $tempat->id }}" @if(old('tempat') == $tempat->id) selected @endif>{{ $tempat->nama_tempat }}</option>    
                            @endforeach
                            
                            
                        </select>
                        @if ($errors->has('tempat'))
                            <span class="help-block">
                            <strong>{{ ucwords($errors->first('tempat')) }}</strong>
                            </span>
                        @endif
                </div> 
          
               
                

                
                <div  class="form-group has-feedback {{ $errors->has('masa') ? 'has-error' : '' }}">
                        <label for="masa">Masa</label>
                        <input name="masa" class="form-control" value="{{ old('masa') }}">
                        @if ($errors->has('masa'))
                            <span class="help-block">
                                <strong>{{ ucwords($errors->first('masa')) }}</strong>
                            </span>
                        @endif
                </div>     
                
               

                
                <div  class="form-group has-feedback {{ $errors->has('golongan_sasar') ? 'has-error' : '' }}">
                        <label for="golongan_sasar">Golongan Sasar</label>
                        <input type="text" name="golongan_sasar" class="form-control" value="{{ old('golongan_sasar') }}">
                        @if ($errors->has('golongan_sasar'))
                                <span class="help-block">
                                <strong>{{ ucwords($errors->first('golongan_sasar')) }}</strong>
                                </span>
                        @endif
                </div> 

                
                <div  class="form-group has-feedback {{ $errors->has('yuran') ? 'has-error' : '' }}">
                        <label for="yuran">Yuran Program (RM)</label> <span>
                        <font color="red">(Jika tiada yuran, isi "Percuma")</font>
                        </span>
                        <input type="text" name="yuran" placeholder="RM"  value="{{ old('yuran') }}" class="form-control">
                                @if ($errors->has('yuran'))
                                        <span class="help-block">
                                        <strong>{{ ucwords($errors->first('yuran')) }}</strong>
                                        </span>
                                @endif
                </div> 
           
                

                
                <div  class="form-group has-feedback {{ $errors->has('kuota_peserta') ? 'has-error' : '' }}">
                        <label>Kuota Peserta</label>
                        <input type="number" name="kuota_peserta" class="form-control" value="{{ old('kuota_peserta') }}">
                        @if ($errors->has('kuota_peserta'))
                                <span class="help-block">
                                <strong>{{ ucwords($errors->first('kuota_peserta')) }}</strong>
                                </span>
                        @endif
                </div> 
           
          
                



                
                <div  class="form-group has-feedback {{ $errors->has('pengurus_program') ? 'has-error' : '' }}">
                        <label for="pengurus_program">Urusetia Program</label>
                        <select name="pengurus_program" id="pengurus_program" class="form-control selectpicker">
                                <option value="">--Pilih Urusetia--</option>
                                @foreach ($senaraiUrusetia as $urusetia)
                                <option value="{{ $urusetia->id_pengguna }}" @if(old('pengurus_program') == $urusetia->id_pengguna) selected @endif>{{ $urusetia->no_kad_pengenalan }} - {{ $urusetia->nama_penuh }}</option>    
                                @endforeach
                        </select>
                        @if ($errors->has('pengurus_program'))
                                <span class="help-block">
                                <strong>{{ ucwords($errors->first('pengurus_program')) }}</strong>
                                </span>
                        @endif
                </div> 
                

                
                <div  class="form-group has-feedback {{ $errors->has('penceramah') ? 'has-error' : '' }}">
                        <label for="penceramah">Penceramah/Moderator Program</label>
                        <select name="penceramah[]" id="penceramah" class="form-control" multiple="multiple">
                                <option value="">--Pilih Penceramah--</option>
                                @foreach ($senaraiPenceramah as $penceramah)
                                <option value="{{ $penceramah->id_penceramah }}">{{ $penceramah->no_kad_pengenalan }} - {{ $penceramah->nama_penceramah }}</option>    
                                @endforeach
                        </select>
                        @if ($errors->has('penceramah'))
                                <span class="help-block">
                                <strong>{{ ucwords($errors->first('penceramah')) }}</strong>
                                </span>
                        @endif
                </div> 
                

                
                <div  class="form-group has-feedback {{ $errors->has('objektif') ? 'has-error' : '' }}">
                        <label for="objektif">Objektif</label>
                        <textarea name="objektif" class="form-control" rows="10" cols="30">{{ old('objektif') }}</textarea>
                        @if ($errors->has('objektif'))
                                <span class="help-block">
                                <strong>{{ ucwords($errors->first('objektif')) }}</strong>
                                </span>
                        @endif
                </div>     
 
                

                
                <div  class="form-group has-feedback {{ $errors->has('impak') ? 'has-error' : '' }}">
                        <label for="impak">Impak/Outcome</label>
                        <textarea type="text" name="impak" class="form-control" rows="10" cols="30">{{ old('impak') }}</textarea>
                        @if ($errors->has('impak'))
                        <span class="help-block">
                        <strong>{{ ucwords($errors->first('impak')) }}</strong>
                        </span>
                @endif
                </div> 
                
                <div  class="form-group has-feedback {{ $errors->has('maklumat_tambahan') ? 'has-error' : '' }}">
                        <label for="maklumat_tambahan">Maklumat Tambahan</label>
                        <textarea type="text" name="maklumat_tambahan" class="form-control" rows="10" cols="30">{{ old('maklumat_tambahan') }}</textarea>
                        @if ($errors->has('maklumat_tambahan'))
                        <span class="help-block">
                        <strong>{{ ucwords($errors->first('maklumat_tambahan')) }}</strong>
                        </span>
                @endif
                </div> 
          
                    
                     
    
        </form>
    </div>
    <div class="box box-footer">
        <button type="submit" class='btn btn-success' form="tambahProgramForm">Simpan</button>
        <a class='btn btn-info' href="{{ route('program.index') }}">Kembali</a>
    </div>
</div>

@stop

@section('js')

<script> 

  $(document).ready(function() {
    $('#penceramah').select2();
    @if(!empty(old('penceramah')))
        $('#penceramah').val({!! json_encode(old('penceramah')) !!});
        $('#penceramah').trigger('change');
    @endif   
    $('#pengurus_program').select2();
    $('#tempat').select2();
  });

</script>
@endsection
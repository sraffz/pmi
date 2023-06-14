@extends('adminlte::page')
@section('content')

    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">BORANG KAJI SELIDIK</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <center><img src="{{ asset('/images/logo2.png') }}" width="90%"></center><hr>

      
        <div class="box-body">

          <div class="container-fluid">
            <form class="form-horizontal" action="{{ route('store.peserta.kajiselidik',['idProgram' => $program->id_program]) }}" method = "post">
              {{ csrf_field() }}

              <div class="callout callout-info">
                <h4>MAKLUMAT PROGRAM</h4>
              </div>
  
              <div class="form-group ">
                <label for="nama_program" class="col-sm-2 control-label">TAJUK KURSUS</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ $program->nama_program }}" readonly>
                </div>
              </div>
  
              <div class="form-group ">
                <label for="tarikh_mula" class="col-sm-2 control-label">TARIKH MULA</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ $program->tarikh_mula->format('d/m/Y') }}" readonly>
                </div>
              </div>
  
                <div class="form-group ">
                  <label for="" class="col-sm-2 control-label">TEMPAT</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $program->tempatProgram->nama_tempat }}" readonly>
                  </div>
                </div>
  
              <center><p><u><b><font color="red">** ARAHAN: SILA TANDA DAN PENUHKAN RUANGAN DI BAWAH</font></b></u></p></center>
           
        
                {{-- <div class="callout callout-info">
                  <h4>MAKLUMAT PERIBADI</h4>
                </div>
              
                <div class="form-group">
                  <label for="jantina" class="col-sm-2 control-label" >JANTINA</label>
                  <div class="form-group">
                    <div class="radio">
                      <label>
                        <input type="radio" name="jantina" id="jantina" value="Lelaki">
                        Lelaki
                      </label>
                      <label>
                        <input type="radio" name="jantina" id="jantina" value="Perempuan">
                        Perempuan
                      </label>
                    </div>
                  </div>
                </div>
             
  
              <div class="form-group">
                <label for="umur" class="col-sm-2 control-label" >UMUR</label>
                    <select name="umur">
                      <option>---PILIH UMUR--- </option>
                      <option>30 TAHUN</option>
                      <option>31-40 TAHUN </option>
                      <option>41-50 TAHUN</option>
                      <option>>50 TAHUN</option>
                    </select>
              </div>
                
  
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">PERINGKAT</label>
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox">
                      P&P
                    </label>
                    <label>
                      <input type="checkbox">
                      PELAKSANA
                    </label>
                  </div>
                </div>
              </div>
                
  
  
              <div class="form-group">
                <label for="gred" class="col-sm-2 control-label">GRED JAWATAN</label>
    
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="gred" name="gred" placeholder="Cth: N41" required>
                </div>
              </div> --}}
  
              
              <div class="callout callout-info" >
                <h4>PENILAIAN PROGRAM</h4>
              </div>
  
              <div class="form-group">
                 <label for="penilaian_keseluruhan" class="col-sm-2 control-label">PENILAIAN KESELURUHAN</label>
                <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="penilaian_keseluruhan" id="penilaian_keseluruhan" value="1">
                      <span style='font-size:35px;'>&#128543;</span>
                    </label>
    
                    <label>
                      <input type="radio" name="penilaian_keseluruhan" id="penilaian_keseluruhan" value="2">
                      <span style='font-size:35px;'>&#128533;</span>
                    </label>
  
                    <label>                 
                        <input type="radio" name="penilaian_keseluruhan" id="penilaian_keseluruhan" value="3">
                        <span style='font-size:35px;'>&#128528;</span>
                      </label>
                    </label>
  
                    <label>                 
                      <input type="radio" name="penilaian_keseluruhan" id="penilaian_keseluruhan" value="4">
                      <span style='font-size:35px;'>&#128522;</span>
                    </label>
  
                    <label>                 
                      <input type="radio" name="penilaian_keseluruhan" id="penilaian_keseluruhan" value="5">
                      <span style='font-size:35px;'>&#128512;</span>
                    </label>
                  </div>
                </div> 
              </div>
                
  
                <div class="form-group">
                  <label for="penilaian_kemudahan" class="col-sm-2 control-label">PENILAIAN KEMUDAHAN</label>
                  <div class="form-group">
                    <div class="radio">
                      <label>
                        <input type="radio" name="penilaian_kemudahan" id="penilaian_kemudahan" value="1">
                        <span style='font-size:35px;'>&#128543;</span>
                      </label>
  
                      <label>
                        <input type="radio" name="penilaian_kemudahan" id="penilaian_kemudahan" value="2">
                        <span style='font-size:35px;'>&#128533;</span>
                      </label>
  
                      <label>                 
                          <input type="radio" name="penilaian_kemudahan" id="penilaian_kemudahan" value="3">
                          <span style='font-size:35px;'>&#128528;</span>
                      </label>
  
                      <label>                 
                        <input type="radio" name="penilaian_kemudahan" id="penilaian_kemudahan" value="4">
                        <span style='font-size:35px;'>&#128522;</span>
                      </label>
  
                      <label>                 
                        <input type="radio" name="penilaian_kemudahan" id="penilaian_kemudahan" value="5">
                        <span style='font-size:35px;'>&#128512;</span>
                      </label>
                    </div>
                  </div>
                </div>  
      
                <div class="form-group">
                  <label for="penilaian_bahan" class="col-sm-2 control-label">PENILAIAN BAHAN</label>
                  <div class="form-group">
                    <div class="radio">
                      <label>
                        <input type="radio" name="penilaian_bahan" id="penilaian_bahan" value="1">
                        <span style='font-size:35px;'>&#128543;</span>
                      </label>
  
                      <label>
                        <input type="radio" name="penilaian_bahan" id="penilaian_bahan" value="2">
                        <span style='font-size:35px;'>&#128533;</span>
                      </label>
  
                      <label>                 
                          <input type="radio" name="penilaian_bahan" id="penilaian_bahan" value="3">
                          <span style='font-size:35px;'>&#128528;</span>
                      </label>
  
  
                      <label>                 
                        <input type="radio" name="penilaian_bahan" id="penilaian_bahan" value="4">
                        <span style='font-size:35px;'>&#128522;</span>
                      </label>
  
                      <label>                 
                        <input type="radio" name="penilaian_bahan" id="penilaian_bahan" value="5">
                        <span style='font-size:35px;'>&#128512;</span>
                      </label>
                    </div>
                  </div>
                </div>
                  
  
                <div class="form-group">
                  <label for="penambahbaikan" class="col-sm-2 control-label"> PENAMBAHBAIKAN</label>
  
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="3" id="penambahbaikan" name="penambahbaikan" >{{ old('penambahbaikan') }}</textarea>
                  </div>
                </div>
  
  
                <div class="form-group">
                  <label for="cadangan" class="col-sm-2 control-label">CADANGAN</label>
  
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="3" id="cadangan" name="cadangan" >{{ old('cadangan') }}</textarea>
                  </div>
                </div>
  
                  
                <div class="callout callout-success" >
                  <h4>PENILAIAN PENCERAMAH</h4>
                </div>
  
                @foreach($program->senaraiPenceramah as $key => $penceramah)
  
                <input type="hidden" name="idPenceramah[{{ $key }}]" value="{{ $penceramah->id_penceramah }}">
  
                <div class="form-group ">
                  <label for="nama_program" class="col-sm-2 control-label">Nama Penceramah</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $penceramah->nama_penceramah }}" readonly>
                  </div>
                </div>
  
                <div class="form-group">
                  <label for="soalan1" class="col-sm-2 control-label">PENGETAHUAN TENTANG SUBJEK</label>
                  <div class="form-group">
                    <div class="radio">
                      <label>
                        <input type="radio" name="soalan1[{{ $key }}]" id="soalan1" value="1">
                        <span style='font-size:35px;'>&#128543;</span>
                      </label>
  
                      <label>
                        <input type="radio" name="soalan1[{{ $key }}]" id="soalan1" value="2">
                        <span style='font-size:35px;'>&#128533;</span>
                      </label>
  
                      <label>                 
                          <input type="radio" name="soalan1[{{ $key }}]" id="soalan1" value="3">
                          <span style='font-size:35px;'>&#128528;</span>
                      </label>
  
                      <label>                 
                        <input type="radio" name="soalan1[{{ $key }}]" id="soalan1" value="4">
                        <span style='font-size:35px;'>&#128522;</span>
                      </label>
  
                      <label>                 
                        <input type="radio" name="soalan1[{{ $key }}]" id="soalan1" value="5">
                        <span style='font-size:35px;'>&#128512;</span>
                      </label>
                    </div>
                  </div>
                </div>
  
                <div class="form-group">
                  <label for="soalan2" class="col-sm-2 control-label">PENJELASAN FAKTA-FAKTA DAN CONTOH</label>
                  <div class="form-group">
                    <div class="radio">
                      <label>
                        <input type="radio" name="soalan2[{{ $key }}]" id="soalan2" value="1">
                        <span style='font-size:35px;'>&#128543;</span>
                      </label>
  
                      <label>
                        <input type="radio" name="soalan2[{{ $key }}]" id="soalan2" value="2">
                        <span style='font-size:35px;'>&#128533;</span>
                      </label>
  
                      <label>                 
                          <input type="radio" name="soalan2[{{ $key }}]" id="soalan2" value="3">
                          <span style='font-size:35px;'>&#128528;</span>
                      </label>
  
                      <label>                 
                        <input type="radio" name="soalan2[{{ $key }}]" id="soalan2" value="4">
                        <span style='font-size:35px;'>&#128522;</span>
                      </label>
  
                      <label>                 
                        <input type="radio" name="soalan2[{{ $key }}]" id="soalan2" value="5">
                        <span style='font-size:35px;'>&#128512;</span>
                      </label>
                    </div>
                  </div>
                </div>
  
                <div class="form-group">
                  <label for="soalan3" class="col-sm-2 control-label">GAYA/ PERSEMBAHAN</label>
                  <div class="form-group">
                    <div class="radio">
                      <label>
                        <input type="radio" name="soalan3[{{ $key }}]" id="soalan3" value="1">
                        <span style='font-size:35px;'>&#128543;</span>
                      </label>
  
                      <label>
                        <input type="radio" name="soalan3[{{ $key }}]" id="soalan3" value="2">
                        <span style='font-size:35px;'>&#128533;</span>
                      </label>
  
                      <label>                 
                          <input type="radio" name="soalan3[{{ $key }}]" id="soalan3" value="3">
                          <span style='font-size:35px;'>&#128528;</span>
                      </label>
  
                      <label>                 
                        <input type="radio" name="soalan3[{{ $key }}]" id="soalan3" value="4">
                        <span style='font-size:35px;'>&#128522;</span>
                      </label>
  
                      <label>                 
                        <input type="radio" name="soalan3[{{ $key }}]" id="soalan3" value="5">
                        <span style='font-size:35px;'>&#128512;</span>
                      </label>
                    </div>
                  </div>
                </div>    
                @endforeach
  
                
  
                  <button type="submit" class="btn btn-primary">HANTAR</button> 
                  {{-- <button type="reset" class="btn btn-danger">BATAL</button> --}}

            </form>
          </div>

           


    </div>

    </div>
    
@stop
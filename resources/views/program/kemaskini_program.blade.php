@extends('adminlte::page')

@section('content_header')

@stop


@section ('content')

   
<section class="content">

      <!-- Default box -->
        <div class="box-body">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">KEMASKINI PROGRAM</h3>
              <br><br><br>
              

                    <form action = "{{route('program.update', ['id'=> $program->id_program])}}" method = "post">    
                        {{ method_field('put') }}
                        {{ csrf_field() }}


                    <div class="form-group has-feedback {{ $errors->has('nama_program') ? 'has-error' : '' }}">
                        <label>Nama Program</label>
                        <input type="text" name="nama_program" class="form-control" value="{{$program->nama_program}}" placeholder="Masukkan Nama Program"/>
                        @if ($errors->has('nama_program'))
                            <span class="help-block">
                            <strong>{{ ucwords($errors->first('nama_program')) }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    
                    <div class="form-group has-feedback {{ $errors->has('deskripsi_program') ? 'has-error' : '' }}">
                        <label> Deskripsi Program</label>
                        <input type="text" name="deskripsi_program" class="form-control" value="{{$program->deskripsi_program}}" placeholder="Masukkan Deskripsi Program"/>
                        @if ($errors->has('deskripsi_program'))
                            <span class="help-block">
                            <strong>{{ ucwords($errors->first('deskripsi_program')) }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group has-feedback {{ $errors->has('jenis_program') ? 'has-error' : '' }}">
                        <label>Jenis Program</label>
                        <input type="text" name="jenis_program" class="form-control" value="{{$program->jenis_program}}" placeholder="Masukkan Jenis Program"/>
                        @if ($errors->has('jenis_program'))
                            <span class="help-block">
                            <strong>{{ ucwords($errors->first('jenis_program')) }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group has-feedback {{ $errors->has('tarikh_mula') ? 'has-error' : '' }}">
                        <label>Tarikh Mula</label>

                        <input type="text" name="tarikh_mula" class="form-control" value="{{$program->tarikh_mula}}" placeholder="Masukkan Tarikh Mula"/>
                        @if ($errors->has('tarikh_mula'))
                            <span class="help-block">
                            <strong>{{ ucwords($errors->first('tarikh_mula')) }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group has-feedback {{ $errors->has('tarikh_akhir') ? 'has-error' : '' }}">
                        <label>Tarikh Akhir</label>
                        <input type="text" name="tarikh_akhir" class="form-control" value="{{$program->tarikh_akhir}}" placeholder="Masukkan Tarikh Akhir"/>
                        @if ($errors->has('tarikh_akhir'))
                            <span class="help-block">
                            <strong>{{ ucwords($errors->first('tarikh_akhir')) }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group has-feedback {{ $errors->has('tempat') ? 'has-error' : '' }}">
                        <label>Tempat</label>
                        <input type="text" name="tempat" class="form-control" value="{{$program->tempat}}" placeholder="Masukkan Tempat"/>
                        @if ($errors->has('tempat'))
                            <span class="help-block">
                            <strong>{{ ucwords($errors->first('tempat')) }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group has-feedback {{ $errors->has('masa') ? 'has-error' : '' }}">
                        <label>Masa</label>

                        <input type="text" name="masa" class="form-control" value="{{$program->masa}}" placeholder="Masukkan Masa"/>
                        @if ($errors->has('masa'))
                            <span class="help-block">
                            <strong>{{ ucwords($errors->first('masa')) }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group has-feedback {{ $errors->has('golongan_sasar') ? 'has-error' : '' }}">
                        <label>Golongan Sasar</label>

                        <input type="text" name="golongan_sasar" class="form-control" value="{{$program->golongan_sasar}}" placeholder="Masukkan Golongan Sarar"/>
                        @if ($errors->has('golongan_sasar'))
                            <span class="help-block">
                            <strong>{{ ucwords($errors->first('golongan_sasar')) }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group has-feedback {{ $errors->has('bayaran') ? 'has-error' : '' }}">
                        <label>Bayaran</label>

                        <input type="text" name="bayaran" class="form-control" value="{{$program->bayaran}}" placeholder="Masukkan Bayaran"/>
                        @if ($errors->has('bayaran'))
                            <span class="help-block">
                            <strong>{{ ucwords($errors->first('bayaran')) }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group has-feedback {{ $errors->has('jumlah_bayaran') ? 'has-error' : '' }}">
                        <label>Jumlah Bayaran(RM)</label> <span>

                        <input type="text" name="jumlah_bayaran" class="form-control" value="{{$program->jumlah_bayaran}}" placeholder="Masukkan Jumlah Bayaran"/>
                        @if ($errors->has('jumlah_bayaran'))
                            <span class="help-block">
                            <strong>{{ ucwords($errors->first('jumlah_bayaran')) }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group has-feedback {{ $errors->has('jumlah_peserta') ? 'has-error' : '' }}">
                        <label>Sasaran Jumlah Peserta</label>

                        <input type="text" name="jumlah_peserta" class="form-control" value="{{$program->jumlah_peserta}}" placeholder="Masukkan Jumlah Peserta"/>
                        @if ($errors->has('jumlah_peserta'))
                            <span class="help-block">
                            <strong>{{ ucwords($errors->first('jumlah_peserta')) }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group has-feedback {{ $errors->has('pengurus_program') ? 'has-error' : '' }}">
                        <label>Urusetia Program</label><br />

                        <input type="text" name="pengurus_program" class="form-control" value="{{$program->pengurus_program}}" placeholder="Masukkan Pengurus Program"/>
                        @if ($errors->has('pengurus_program'))
                            <span class="help-block">
                            <strong>{{ ucwords($errors->first('pengurus_program')) }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group has-feedback {{ $errors->has('objektif') ? 'has-error' : '' }}">
                        <label>Objektif</label><br />

                        <input type="text" name="objektif" class="form-control" value="{{$program->objektif}}" placeholder="Masukkan Objektif Program"/>
                        @if ($errors->has('objektif'))
                            <span class="help-block">
                            <strong>{{ ucwords($errors->first('objektif')) }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group has-feedback {{ $errors->has('impak') ? 'has-error' : '' }}">
                        <label>Impak/Outcome</label><br />

                        <input type="text" name="impak" class="form-control" value="{{$program->impak}}" placeholder="Masukkan Impak Program"/>
                        @if ($errors->has('impak'))
                            <span class="help-block">
                            <strong>{{ ucwords($errors->first('impak')) }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="box-footer">
                        
                        <button  type="submit"  class="btn btn-primary">Kemaskini</button> 
                        
                        <a href="{{ route('program.index') }}" class="btn btn-danger">Kembali</a>

                      </p> 
                    </form>
                </div>
            </div>
        <!-- /page content -->
</center>
        </div>

      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


 @endsection
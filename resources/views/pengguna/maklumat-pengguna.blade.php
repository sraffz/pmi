@extends('adminlte::page')

@section('content_header')

@stop

@section('content')   
  <section class="content">

    <!-- Default box -->
      <div class="box-body">
        <div class="box">
          <div class="box-header">
        <h3 class="box-title"></h3>
      </div>
      <div class="box-body"> 
<center>
      <!-- page content area main -->
      <div class="right_col" role="main">
          <div class="">
              <div class="clearfix"></div>
              <div class="row" style="min-height:500px">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                          <div class="x_title">

                              <center><h3><font color="green"></font></h3></center>

                              <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <h4 class="box-title">KEMASKINI PENGGUNA</h4>

                               <form action="" method="post" class="col-lg-10" enctype="multipart/form-data">

                                  <table class="table table-bordered">
                                      <tr>
                                          <td>
                                              <label>Nama Pengguna</label>
                                          <input type="text" name="nama" class="form-control" pattern="[^0-9]*" value="{{$pengguna->nama_penuh}}"  >
                                          </td>
                                      </tr>
                                      
                                      <tr>
                                          <td>
                                              <label >Nombor Kad Pengenalan</label>
                                          <input type="text" name="noKP" class="form-control" maxlength="12"  title="Masukkan 12 Angka" value="{{$pengguna->no_kad_pengenalan}}"  >
                                              
                                          </td>
                                      </tr>
                                  

                                      <tr>
                                          <td>
                                              <label>Alamat</label>
                                          <input type="text" name="alamatAgensi" class="form-control" value="{{$pengguna->alamat}}"  >
                                          </td>
                                      </tr>                                        

                                      <tr>
                                          <td>
                                              <label>Nombor Telefon</label>
                                              <input type="text" name="noTel" class="form-control"  value="{{$pengguna->no_telefon}}"  >
                                          </td>
                                      </tr>

                                      <tr> 
                                          <td>
                                              <label>E-mail</label>
                                          <input type="text" name="email" class="form-control" placeholder="" value="{{$pengguna->email}}"  >
                                          </td>
                                      </tr>
                                  <tr>
                                      <td>
                                          <center>
                                          <input type="submit" name="kemaskini" class="btn btn-success"  href=''  onclick="return confirm('Adakah Anda Ingin Mengemaskini Maklumat Peserta ini?')"   value="Kemaskini">
                                          <a class='btn btn-danger' href='{{ route('pengguna.destroy', ['id_pengguna' => $pengguna->id_pengguna] ) }}'  onclick="return confirm('Adakah Anda Ingin Padam Maklumat Peserta ini?')">Padam</a>
                                          {{-- <input type="submit" name="padam" class="btn btn-danger" value="padam"> --}}
                                          &nbsp;&nbsp;<a href="javascript:history.back(1)"><button type="button" class="btn btn-success">Kembali</button></a>
                                          </center>
                                      </td>
                                          
                                  </tr>

                                  </table>
                              </form>

                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- /page content -->
</center>
      </div>
      <!-- /.box-body -->
      <!-- <div class="box-footer">
        Footer
      </div> -->
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->   
@endsection
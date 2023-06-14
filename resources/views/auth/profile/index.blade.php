@extends('adminlte::page')

@section('content_header')

@stop

<section class="content">
                    <!-- Default box -->
                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">MAKLUMAT PENGGUNA</h3>
              
                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                            <i class="fa fa-minus"></i></button>
                          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                            <i class="fa fa-times"></i></button>
                        </div>
                      </div>
                      <div class="box-body">
                        <div class="box">
                          <!-- <div class="box-header">
                            <h3 class="box-title">Data Table With Full Features</h3>
                          </div> -->
                          <!-- /.box-header -->
                          <div class="box-body">
                            <div class="col-lg-2">
                        <div class="card" style="width: 50rem;">
                          <div class="card-body">
              
                </div></div></div><table id="example1" class="table table-bordered table-striped dataTable"> 
              <tbody>
                <style>
              table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
              }
              
              td, th {
                border: 1px solid #bbbbbb;
                text-align: left;
                  padding: 8px;
              }
              
              tr:nth-child(even) {
                  background-color: #ffffff;
              }
              .conn {
                  background-color: #e6e6e6 ;
                  width: 1000px;
                  border: 0px solid black;
                  padding: 10px;
                  margin: 15px;
              }
              
              </style>
              
              
              
                    
                    </tbody></table><table>
              
                      
                <tbody><tr>
                
                  <th>Nama</th>  <td></td></tr>
                  <tr><th>Nombor Kad Pengenalan</th> <td></td></tr>
                  <tr><th>Nombor Telefon</th><td></td></tr>
                  <tr><th>E-mail</th><td></td></tr>
                  <tr><th>Kategori Pengguna</th> <td></td></tr>
                  <tr><th>Alamat</th><td></td></tr>
                 
                </tbody></table>
              
                <br><br>
              
                 
                                  
                                     <center>
                                          <a href="update_user_profile.php?penggunaid="><input class="btn btn-success " type="submit" name="back" value="Kemaskini"></a>
                                                 
                                          <a href="dashboard.php"><input type="submit" name="submit" class="btn btn-danger" value="Kembali"></a>
                                      </center>
                                
                              
                
                  
              
              </div>
              </div>
              </div>
              </div>
              </section>

              @stop
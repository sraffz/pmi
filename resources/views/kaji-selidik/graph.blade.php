@extends('adminlte::page')

@section('content_header')
<h3>Dapatan Kaji Selidik Program : <strong>{{ $program->nama_program }}</strong>  </h3>
@stop

@section('content')

     <div class="box box-primary">
     <div class="box-header with-border">
       <h3 class="box-title">Penilaian Program  </h3>
       <div class="box-tools pull-right">
          Bilangan Menjawab : {{$program->senaraiKajiSelidikPengguna->count()}} Peserta
        </div>
     </div>

     <div class="box-body">
          <div class="container-fluid">
               <div class="row">
                    <div class="col-md-4">
                         {!! $bahagianA1->container() !!}   
                    </div>
                    <div class="col-md-4">
                         {!! $bahagianB1->container() !!} 
                    </div>
                    <div class="col-md-4">
                         {!! $bahagianC1->container() !!} 
                    </div>
               </div>
            
          </div>
          
          
     </div>
     <!-- /.box-body -->
   </div>

     <div class="box box-primary">
       <div class="box-header">
         <h3 class="box-title">Penambahbaikan dan Cadangan Program</h3>
         <div class="box-tools pull-right">
          Bilangan Menjawab : {{$program->senaraiKajiSelidikPengguna->count()}} Peserta
        </div>
       </div> 

           <div class="box-body">
               
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                    <th style="width: 125px;">Bil</th>
                    <th style="width: 248px;">Nama Peserta</th>
                    <th style="width: 558px;">Penambahbaikan Program</th>
                    <th style="width: 558px;">Cadangan</th>
               </tr>
               </thead>
   
 
                 <tbody>
                     @foreach ($program ->senaraiKajiSelidikPengguna  as  $peserta)
                   
             
                         <tr>
              
                             <td>{{$loop->iteration}}</td>
                             <td>{{$peserta->nama_penuh}}</td>
                             <td>{{$peserta->kaji_selidik->penambahbaikan}}</td>
                             <td>{{$peserta->kaji_selidik->cadangan}}</td>

                         </tr>
                         @endforeach
                       </tbody>
          
           
               </table>
          </div>
            
     </div>


     <div class="box box-primary">
          <div class="box-header with-border">
               <h3 class="box-title">Penilaian Penceramah</h3>
               <div class="box-tools pull-right">
                    Bilangan Menjawab : {{$program->senaraiKajiSelidikPengguna->count()}} Peserta
                  </div>
          </div>
          
          <div class="box-body">
               <div class="container-fluid">
                    <div class="row">
                         
                         @foreach ($penilaianPenceramah as $penilaian)
                              
                              <div class="col col-md-12 well">
                                   <h4> <strong>{{ $penilaian['nama_penceramah'] }}</strong> </h4>
                                   <div class="container-fluid">
                                        <div class="row">
                                             <div class="col col-md-4">
                                                  {!! $penilaian['chart1']->container() !!} 
                                             </div>
                                             <div class="col col-md-4">
                                                  {!! $penilaian['chart2']->container() !!} 
                                             </div>
                                             <div class="col col-md-4">
                                                  {!! $penilaian['chart3']->container() !!} 
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         @endforeach
                    </div>
                </div>
          </div>
     
     </div>
     

@endsection


@section('js')

     {!! $bahagianA1->script() !!}
     {!! $bahagianB1->script() !!}
     {!! $bahagianC1->script() !!}
     @foreach ($penilaianPenceramah as $penilaian)
         {!! $penilaian['chart1']->script() !!}
         {!! $penilaian['chart2']->script() !!}
         {!! $penilaian['chart3']->script() !!}
     @endforeach

     <script>
          $('#example1').DataTable()
        </script>
@endsection
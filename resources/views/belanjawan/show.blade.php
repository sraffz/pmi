@extends('adminlte::page')
@section('content')
    
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Detail Perbelanjaan</h3>
        </div>
         
        <div class="box-body">
          <b>Nama Program:</b> {{ $program->nama_program }}  <font color="blue"></font><br>
          <b>Tarikh Program:</b> {{ $program->tarikh_mula->format('d/m/Y')}}<br>
          <b>Tempat Program:</b> {{$program->tempatProgram->nama_tempat}}<br>
          <b>Jumlah Peserta:</b> {{$program->jumlah_peserta}}<br>
          <b>Yuran(RM):</b> @if(is_numeric($program->yuran)) {{ number_format($program->yuran,2)}} @else {{ $program->yuran }} @endif<br>
          <br>
           <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Bil.</th>
                  <th>Keterangan</th>
                  <th>Butiran</th>
                  <th>Jumlah(RM)</th>
                </tr>
               </thead>
                <tbody>     
                <tr>
                  <td>1</td>
                  <td>Penceramah</td>
                <td>{{ $program->belanjawan->butiran_penceramah}}</td>                  
                  <td>{{ number_format( $program->belanjawan->bayaran_penceramah,2)}}</td></tr>
                <tr>
                  <td>2</td>
                  <td>Fasilitator</td>
                  <td>{{ $program->belanjawan->butiran_fasilitator}}</td>                  
                  <td>{{  number_format($program->belanjawan->bayaran_fasilitator,2)}}</td>                 
                  </tr>

                <tr>
                  <td>3</td>
                  <td>Penginapan</td>
                  <td>{{ $program->belanjawan->butiran_penginapan}}</td>                  
                  <td>{{  number_format($program->belanjawan->bayaran_penginapan,2)}}</td>
                </tr>

                <tr>
                  <td>4</td>
                  <td>Makanan</td>
                  <td>{{ $program->belanjawan->butiran_makanan}}</td>                  
                  <td>{{  number_format($program->belanjawan->bayaran_makanan,2)}}</td>
                </tr>

                <tr>
                  <td>5</td>
                  <td>Backdrop</td>
                  <td>{{ $program->belanjawan->butiran_tiraiBelakang}}</td>                  
                  <td>{{ number_format($program->belanjawan->bayaran_tiraiBelakang,2)}}</td>
                </tr>

                <tr>
                  <td>6</td>
                  <td>Cenderahati</td>
                  <td>{{ $program->belanjawan->butiran_cenderahati}}</td>                  
                  <td>{{ number_format($program->belanjawan->bayaran_cenderahati,2) }}</td>
                </tr>

                <tr>
                  <td>7</td>
                  <td>Tiket Penerbangan</td>
                  <td>{{ $program->belanjawan->butiran_tiket}}</td>                  
                  <td>{{  number_format($program->belanjawan->bayaran_tiket,2)}}</td>
                </tr>

                <tr>
                  <td>8</td>
                  <td>Sijil</td>
                  <td>{{ $program->belanjawan->butiran_sijil}}</td>                  
                  <td>{{ number_format( $program->belanjawan->bayaran_sijil,2)}}</td>
                </tr>

                <tr>
                  <td>9</td>
                  <td>Tempat</td>
                  <td>{{ $program->belanjawan->butiran_tempat}}</td>                  
                  <td>{{ number_format( $program->belanjawan->bayaran_tempat,2)}}</td>
                </tr>

                <tr>
                  <td>10</td>
                  <td>Lain lain</td>
                  <td>{{ $program->belanjawan->butiran_lain}}</td>                  
                  <td>{{ number_format( $program->belanjawan->bayaran_lain,2)}}</td>
                </tr>

                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                <td><font size="4pt"><strong>RM {{ number_format($program->belanjawan->jumlah,2)}}</strong></font></td>
                </tr>
                </tbody>
              </table>

       
                <br>

             <a href="../laporanbaru/slip_belanjawan.php?programid= " target="_blank"> <button class='btn btn-success'> <i class='fa fa-print' ></i> Cetak </button></a>


             <a href="{{ route('belanjawan.edit', ['id'=> $program->id_program])}}"><input class="btn btn-default submit " type="submit" name="back" value="Kemaskini" style="background-color: #2b5e8c; color:white; width:85px;"></a>

           <a href="{{ route('program.index') }}" class="btn btn-danger">Kembali </a>  
    
            </div>
            <!-- /.box-body -->
          </div>
     

    </section>
</section>
    
@endsection

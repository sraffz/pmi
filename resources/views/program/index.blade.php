@extends('adminlte::page')

@section('content_header')

@stop

@section('css')
<style>
  </style>
@endsection

@section('content')

        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">PENGURUSAN PROGRAM</h3>

            <div class="box-tools pull-right">
              <a href=" {{ route('program.create') }}" class="btn btn-success">Tambah Program</a>
            </div>
          </div>
          <br>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="programTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Bil</th>
                <th>Nama Program</th>
                <th>Tarikh</th>
                <th>Tempat</th>
                <th>Urusetia</th>
                <th>Hebahan</th>
                <th>Lampiran</th>
                <th>Maklumat</th>
                <th>Status</th>
              </tr>
              </thead>
              <tbody>
                  @foreach ($senaraiProgram as $program)
                    <tr>
                        <td> {{ $loop->iteration }}</td>
                        <td> {{ $program->nama_program }} </td>
                        <td> {{ $program->tarikh_mula->format('d/m/Y') }} </td>
                        <td> {{ $program->tempatProgram->nama_tempat }} </td>
                        <td> {{ $program->urusetia->nama_penuh }} </td>
                        <td> 
                          <a href="#"  class="btn btn-primary btn-block"
                          onclick="popUp=window.open('https://www.facebook.com/sharer/sharer.php?{{ route('program.share',['uuid' => $program->qrcode_kehadiran]) }}', 'popupwindow', 'scrollbars=yes,height=300,width=550');popUp.focus();return false"
                          >Facebook</a>
                          @php
									          $message = urlencode("Ikuti Program Pembangunan Sains Teknologi : $program->nama_program di pautan berikut ".route('program.share',['uuid' => $program->qrcode_kehadiran]));
								          @endphp
						  	          <a href="https://wa.me/?text={{ $message }}" class="btn btn-success btn-block" target="_blank">Whatsapp</a>
                        </td>
                        <td> 

                          <a href="{{ route('program.slide', ['id' => $program->id_program]) }}" class="btn btn-block" style="background-color: #660066; color:white;">Slaid</a>
                          <a href="{{ route('program.aturcara', ['id' => $program->id_program]) }}" class="btn btn-block" style="background-color: #cc66ff; color:white;">Aturcara</a>
                          <a href="{{ route('gambar.program.show', ['id' => $program->id_program]) }}" class='btn btn-block'  style="background-color: #a12fda; color:white;">Gambar</a>
                        
                        </td>

                        <td>
                          <a href="{{route('program.belanjawan',['id' =>$program->id_program])}}"  class="btn btn-block" style="background-color: #2b8c32; color:white;">Belanjawan</a>
                          <a href="{{route('program.show',['id' =>$program->id_program ])}}" class="btn btn-block"style="background-color: #47d147; color:white;">Program</a>
                          
                          {{-- Jika tempat program secara maya papar butang zoom meeting --}}
                          @if ($program->tempat == 7)
                            <a href="{{route('program.kemaskini-zoom',['id' =>$program->id_program ])}}" class="btn btn-primary btn-block">Zoom Meeting</a>
                          @endif

                        <td>
                          <ul>
                            <li>@if($program->status_aktif) <small class="label bg-green">Program Dibuka</small> @else <small class="label bg-red">Program Ditutup</small> @endif</li>
                            <li>@if($program->status_penyertaan) <small class="label bg-green">Penyertaan Dibuka</small> @else <small class="label bg-red">Penyertaan Ditutup</small> @endif</li>
                            <li>@if($program->status_kehadiran) <small class="label bg-green">Kehadiran Dibuka</small> @else <small class="label bg-red">Kehadiran Ditutup</small> @endif</li>
                          </ul>
                        </td>
                    </tr>
                  @endforeach

              </tbody>
            </table>
          </div>
  
        </div>

		
@stop

@section('js')
    <script>
        $('#programTable').DataTable();
    </script>
@stop
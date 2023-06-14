@extends('adminlte::page')

@section('content')

  	<div class="box box-primary">
    	<div class="box-header">
          <h3 class="box-title">Senarai Kehadiran Program : <strong>{{ $program->nama_program }}</strong></h3>
        </div>
     

        <div class="box-body">
			<div class="box-tools">
				<div class="container-fluid">
				<form action = "{{ route('program.kemaskini-kehadiran',['id' => $program->id_program]) }}" method = "post">
				  {{ csrf_field() }}
				
					<div class="row">
						<div class="form-group col col-md-6">
						<label for="senaraiPeserta">Peserta :</label>
						<select class="js-example-basic-multiple form-control" id="senaraiPeserta"  name="senaraiPeserta[]" multiple="multiple">
							<option></option>
							@foreach ($program->senaraiPeserta as $peserta)
							<option value="{{$peserta->id_pengguna}}">{{$peserta->no_kad_pengenalan}} - {{$peserta->nama_penuh}}</option>
							@endforeach
						</select> 
						</div>

						<div  class="form-group  col col-md-6">
							<label for="tarikh_kehadiran">Tarikh Kehadiran</label>
							<input type="date" name="tarikh_kehadiran" id="tarikh_kehadiran" class="form-control" min="{{ $program->tarikh_mula->format('Y-m-d') }}" max="{{ $program->tarikh_akhir->format('Y-m-d') }}"   value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
						</div>	
					</div>
					 <div class="row">
						<div  class="form-group  col col-md-6">
                        	<button type="submit" class="btn btn-primary">Tambah Kehadiran Peserta</button>   
                		</div> 
					 </div>

					 
					           
				</form>	
				</div>
				
			  </div>
			  <hr>
            <table id="kehadiranTable" class="table table-bordered table-striped">
              <thead>
                <tr role="row">
                  <th >Bil</th>
                  <th >No Kad Pengenalan Peserta</th>
                  <th >Nama Peserta</th>
                  <th >Tarikh Hadir</th>
                  <th >Tindakan</th>
                </tr>
              </thead>
       
            <tbody>
                @foreach ($program->senaraiKehadiran  as $peserta)
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> {{ $peserta->no_kad_pengenalan }} </td>
                        <td> {{ $peserta->nama_penuh }} </td>
                        <td> {{ $peserta->pivot->created_at->format('d/m/Y') }} </td>
                        <td width="10%">
							{{-- <a href="{{route('kehadiran.edit', ['id' => $peserta->id_pengguna])}}" class="btn btn-primary btn-block">Detail Peserta</a> --}}
							<a href="{{ route('program.batal-kehadiran', ['idProgram' => $program->id_program ,'idPeserta' => $peserta->id_pengguna, 'tarikh' => $peserta->pivot->created_at->format('Y-m-d')]) }}" class="btn btn-danger btn-block pengesahan-batal" onclick="return false">Batal Kehadiran</a>
						</td>
                    </tr>
                @endforeach
            </tbody>
 
       
            </table>
        </div>
    </div>

    @endsection
    
    @section('js')

	<script>
	$(document).ready(function(){
		$('.js-example-basic-multiple').select2();

		$('#kehadiranTable').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'pdf',
					exportOptions: 
					{
						columns: ':visible'
					}
				},
				{
					extend: 'excel',
					exportOptions: 
					{
						columns: ':visible'
					}
				},
				{
					extend: 'print',
					exportOptions: 
					{
						columns: ':visible'
					}
				},
				'colvis'
			]
		});

		$('.pengesahan-batal').click(function(){
			hapus = Swal.fire({
				title: 'Pengesahan Pembatalan!',
				text: 'Klik Teruskan untuk batal kehadiran peserta.',
				type: 'info',
				confirmButtonText: 'Teruskan',
				showCancelButton: true,
				cancelButtonText: 'Batal'
			}).then((result) => {
				if (result.value) {
					window.location.href = $(this).attr("href");
				}
			})
		});
		
	});
  </script>
    @endsection 
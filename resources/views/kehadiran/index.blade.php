@extends('adminlte::page')

@section('content')

  	<div class="box box-primary">
    	<div class="box-header">
          <h3 class="box-title">Senarai Kehadiran Program : <strong>{{ $program->nama_program }}</strong></h3>
        </div>
     

        <div class="box-body">
			<div class="box-tools">
				<form role="form" action = "{{ route('update.senarai.kehadiran',['id' => $program->id_program]) }}" method = "post">
				  {{ csrf_field() }}
				
				
					<div class="form-group">
					  <label>Tambah Kehadiran Peserta :</label>
					  <select class="js-example-basic-multiple" name="senaraiPeserta[]" multiple="multiple">
						<option></option>
						@foreach ($program->senaraiPeserta as $individu)
						  <option value="{{$individu->id_pengguna}}">{{$individu->no_kad_pengenalan}} - {{$individu->nama_penuh}}</option>
						@endforeach
					  </select> 
					</div>
					  <button type="submit" class="btn btn-primary">Tambah</button>            
				</form>
			  </div>
			  <hr>

            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr role="row">
                  <th >Bil</th>
                  <th >No Kad Pengenalan Peserta</th>
                  <th >Nama Peserta</th>
                  <th >Tindakan</th>
                </tr>
              </thead>
       
            <tbody>
                @foreach ($program->senaraiKehadiran  as $peserta)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$peserta->no_kad_pengenalan}}</td>
                        <td>{{$peserta->nama_penuh}}</td>
                        <td width="10%">
							<a href="{{route('kehadiran.edit', ['id' => $peserta->id_pengguna])}}" class="btn btn-primary btn-block">Detail Peserta</a>
							<a href="{{ route('kehadiran.destroy', ['id' => $peserta->pivot->id_kehadiran]) }}" class="btn btn-danger btn-block pengesahan-batal" onclick="return false">Batal Kehadiran</a>
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

		$('#example1').DataTable()

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
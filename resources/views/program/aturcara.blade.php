@extends('adminlte::page')

@section('content_header')

@stop

@section('content')

<section class="content">


  <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Aturcara Program</h3>
      <div class="box-tools pull-right">
      
      </div>
    </div>
    <div class="box-body">

		
		<div class="container-fluid">
			<div class="row">
				<div class="col col-md-6">
					<form action="{{ route('program.kemaskini-aturcara', ['id' => $program->id_program]) }}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						
						
						<div class="form-group has-feedback {{ $errors->has('aturcara') ? 'has-error' : '' }}">
							<label for="aturcara">Kemaskini Aturcara Program (pdf sahaja, maximum fail saiz 10mb)</label>
							<input type="file" class="form-control" id="aturcara" name="aturcara">
							@if ($errors->has('aturcara'))
								<span class="help-block">
									<strong>{{ ucwords($errors->first('aturcara')) }}</strong>
								</span>
							@endif
						</div>
						
					
						<button type="submit" class="btn btn-primary">Simpan</button>
						<a href="{{ route('program.index') }}" class="btn btn-info">Kembali</a>
					</form>
				</div>
				<div class="col col-md-6">
					@if($program->aturcara()->exists())

            <div class="box box-widget">
              <div class="box-header">
				<a href="{{ route('program.hapus-aturcara', ['id' => $program->id_program]) }}" class="btn btn-danger"> Hapus Aturcara</a>
				<a href="{{ asset('storage/lampiran/'.$program->aturcara()->first()->lokasi) }}" class="btn btn-info" download="Aturcara"> Download Aturcara</a>
              </div>
     
              <div class="box-body">
				<iframe src="{{ asset('storage/lampiran/'.$program->aturcara()->first()->lokasi) }}" frameborder="0" width="100%" height="500" allowfullscreen="true"></iframe>
                {{-- <img class="img-responsive pad" src="{{ asset('storage/lampiran/'.$program->aturcara()->first()->lokasi) }}" alt="Aturcara"> --}}
              </div>
            </div>
					@else
            <div class="box box-widget">
              <div class="box-header">
                  <h4>Tiada Lampiran</h4>
              </div>
            </div>
					@endif
				</div>
			</div>
		</div>

		
		
		
    </div>


  </div>
</section>
@endsection

@extends('adminlte::page')

@section('content_header')

@stop

@section('content')

<section class="content">


  <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Slide Program</h3>
      <div class="box-tools pull-right">
      
      </div>
    </div>
    <div class="box-body">

		
		<div class="container-fluid">
			<div class="row">
				<div class="col col-md-6">
					<form action="{{ route('program.kemaskini-slaid', ['id' => $program->id_program]) }}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						
						
						<div class="form-group has-feedback {{ $errors->has('slaid') ? 'has-error' : '' }}">
							<label for="slaid">Kemaskini slaid Program (pdf sahaja, maximum fail saiz 10mb)</label>
							<input type="file" class="form-control" id="slaid" name="slaid">
							@if ($errors->has('slaid'))
								<span class="help-block">
									<strong>{{ ucwords($errors->first('slaid')) }}</strong>
								</span>
							@endif
						</div>
						
					
						<button type="submit" class="btn btn-primary">Simpan</button>
						<a href="{{ route('program.index') }}" class="btn btn-info">Kembali</a>
					</form>
				</div>
				<div class="col col-md-6">
					
					@if($program->slaid()->exists())
						
						<div class="box box-widget">
							<div class="box-header">
								<a href="{{ route('program.hapus-slaid', ['id' => $program->id_program]) }}" class="btn btn-danger"> Hapus Slaid</a>
								<a href="{{ asset('storage/lampiran/'.$program->slaid()->first()->lokasi) }}" class="btn btn-info" download="Slaid"> Download Slaid</a>
							</div>
				   
							<div class="box-body">
								<iframe src="{{ asset('storage/lampiran/'.$program->slaid()->first()->lokasi) }}" frameborder="0" width="100%" height="500" allowfullscreen="true"></iframe>
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

@extends('adminlte::page')


@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Senarai Tempat Program</h3>

        <div class="box-tools pull-right">
            <a href=" {{ route('tempat_program.create') }}" class="btn btn-success">Tambah Tempat</a>
        </div>
    </div>
    <div class="box-body">
        

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Bil</th>
                            <th>Nama Tempat</th>
                            <th >Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($senarai_tempat_program as $tempat_program)
                            <tr>
                                <td width="10%">{{ $loop->iteration }}</td>
                                <td>{{ $tempat_program->nama_tempat }}</td>

                                <td width="10%">
                                    <a href='{{ route('tempat_program.edit', ['id' => $tempat_program->id] ) }}' class="btn btn-primary btn-block">Kemaskini</a>
                                    <a href='{{ route('tempat_program.destroy', ['id' => $tempat_program->id] ) }}' class="btn btn-danger btn-block pengesahan" onclick="return false">Hapus</a>
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
        $('.pengesahan').click(function(){
            hapus = Swal.fire({
                title: 'Pengesahan Hapus Rekod!',
                text: 'Klik Teruskan untuk hapuskan rekod.',
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
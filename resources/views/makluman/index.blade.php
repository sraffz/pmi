@extends('adminlte::page')


@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Senarai Makluman</h3>

        <div class="box-tools pull-right">
            <a href=" {{ route('makluman.create') }}" class="btn btn-success">Tambah Makluman</a>
        </div>
    </div>
    <div class="box-body">
        

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Bil</th>
                            <th>Tajuk</th>
                            <th>Keterangan</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($senarai_makluman as $makluman)
                            <tr>
                                <td width="10%">{{ $loop->iteration }}</td>
                                <td>{{ $makluman->tajuk }}</td>
                                <td>{!! nl2br(e($makluman->keterangan)) !!}</td>

                                <td width="10%">
                                    <a href='{{ route('makluman.edit', ['id' => $makluman->id] ) }}' class="btn btn-primary btn-block">Kemaskini</a>
                                    <a href='{{ route('makluman.destroy', ['id' => $makluman->id] ) }}' class="btn btn-danger btn-block pengesahan" onclick="return false">Hapus</a>
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
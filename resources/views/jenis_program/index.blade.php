@extends('adminlte::page')


@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Senarai Jenis Program</h3>

            <div class="box-tools pull-right">
                <a href=" {{ route('jenis_program.create') }}" class="btn btn-success">Tambah Jenis</a>
            </div>
        </div>
        <div class="box-body">


            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Bil</th>
                        <th>Jenis Program</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($senarai_jenis_program as $jenis_program)
                        <tr>
                            <td width="10%">{{ $loop->iteration }}</td>
                            <td>{{ $jenis_program->nama_jenis }}</td>

                            <td width="10%">
                                <a href='{{ route('jenis_program.edit', ['id' => $jenis_program->id]) }}'
                                    class="btn btn-primary btn-block">Kemaskini</a>
                                <a href='{{ route('jenis_program.destroy', ['id' => $jenis_program->id]) }}'
                                    class="btn btn-danger btn-block pengesahan" onclick="return false">Hapus</a>
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
        $(document).ready(function() {
            $('.pengesahan').click(function() {
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

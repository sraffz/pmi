@extends('adminlte::page')

@section('content_header')

@stop

@section('content')

    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Senarai Permohonan Penyertaan Program </h3></strong>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="programTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Bil</th>
                        <th>Nama Program</th>
                        <th>Tarikh</th>
                        <th>Tempat</th>
                        <th>Status Permohonan</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($senaraiProgram as $program)
                        <tr>
                            <td> {{ $loop->iteration }}</td>
                            <td> {{ $program->nama_program }} </td>
                            <td> {{ $program->tarikh_mula->format('d.m.Y') }} </td>
                            <td> {{ $program->tempatProgram->nama_tempat }} </td>
                            <td>
                                @if ($program->daftar_program->status_pengesahan)
                                    <span class="label bg-green">Diterima</span>
                                    @php
                                        $id = Crypt::encryptString($program->id_program);
                                    @endphp
                                    {{-- <a class="btn btn-xs btn-primary" target="blank" href="{{ route('surat.tawaran.individu', ['id' => $id]) }}" role="button">Surat Tawaran</a> --}}
                                @else
                                    <span class="label bg-yellow">Dalam Proses</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('batal.peserta.individu', ['id' => $program->id_program]) }}"
                                    class="btn btn-danger pengesahan-batal" onclick="return false">Batal Penyertaan</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>


@stop

@section('js')
    <script>
        $('#programTable').DataTable();
    </script>

    <script>
        $(document).ready(function() {
            $('.pengesahan-batal').click(function() {
                hapus = Swal.fire({
                    title: 'Pengesahan Pembatalan!',
                    text: 'Klik Teruskan untuk batal permohonan.',
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
@stop

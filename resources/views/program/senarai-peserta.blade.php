@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Senarai Peserta Program : <strong>{{ $program->nama_program }}</strong> </h3>
                        {{-- <div class="box-tools pull-right">
                            <h3 class="box-title">Jumlah Peserta : {{ $program->jumlah_peserta }}/{{ $program->kuota_peserta }} </h3>
                        </div> --}}
                    </div>

                    <div class="box-body pad">

                        <div class="box-tools">
                            <div class="row">
                                <div class="col-md-10">
                                    <form role="form" class="form-inline"
                                        action = "{{ route('update.senarai.peserta', ['id' => $program->id_program]) }}"
                                        method = "post">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <div class="form-group">
                                            <label for="senaraiPeserta">Tambah Peserta</label>
                                            <select class="form-control js-example-basic-multiple " name="senaraiPeserta[]"
                                                id="senaraiPeserta" multiple="multiple">
                                                <option></option>
                                                @foreach ($senaraiPengguna as $individu)
                                                    <option value="{{ $individu->id_pengguna }}">
                                                        {{ $individu->no_kad_pengenalan }} -
                                                        {{ $individu->nama_penuh }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row mt-3">
                            <div class="pull-right">
                                <span class="badge badge-dark">Jumlah Peserta :
                                    {{ $program->jumlah_peserta }}/{{ $program->kuota_peserta }}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
                        </div>
                        <hr>
                        <table id="senaraiPesertaTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Bil.</th>
                                    <th>No Kad Pengenalan</th>
                                    <th>Nama Peserta</th>
                                    <th>Jawatan & Gred</th>
                                    <th>Jabatan</th>
                                    <th>No Telefon</th>
                                    <th>Status Peserta</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($program->senaraiPeserta as $id => $peserta)
                                    @php
                                        $jabatan = DB::table('jabatan')
                                            ->where('jabatan_id', $peserta->jabatan)
                                            ->first();
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $peserta->no_kad_pengenalan }}</td>
                                        <td>{{ $peserta->nama_penuh }}</td>
                                        <td>{{ $peserta->skim }} ({{ $peserta->gred_kod . '' . $peserta->gred }})</td>
                                        <td>{{ $jabatan->nama_jabatan }}</td>
                                        <td>{{ $peserta->no_telefon }}</td>
                                        <td>
                                            <ul>
                                                <li>
                                                    @if ($peserta->senarai_peserta->status_kehadiran)
                                                        <span class="label bg-green">Hadir</span>
                                                    @else
                                                        <span class="label bg-red">Tidak Hadir</span>
                                                    @endif
                                                </li>
                                                <li>
                                                    @if ($peserta->senarai_peserta->status_kajiselidik)
                                                        <span class="label bg-green">Telah Jawab Kajiselidik</span>
                                                    @else
                                                        <span class="label bg-red">Belum Jawab Kaji Selidik</span>
                                                    @endif
                                                </li>
                                            </ul>
                                        </td>
                                        <td><a class='btn btn-danger pengesahan-pembatalan'
                                                href='{{ route('delete.peserta', ['id_program' => $program->id_program, 'id_peserta' => $peserta->id_pengguna]) }}'
                                                onclick="return false">Batal Penyertaan</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();

            $('#senaraiPesertaTable').DataTable({
                "buttons": ['copy', 'excel', 'pdf', 'print'],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Malay.json"
                },
                "responsive": true,
                "columnDefs": [{
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 1,
                        targets: 1
                    }
                    // { responsivePriority: 1, targets: -1 }
                ],
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ]
            })

            $('.pengesahan-pembatalan').click(function() {
                hapus = Swal.fire({
                    title: 'Pengesahan Pembatalan!',
                    text: 'Klik Teruskan untuk batalkan permohonan.',
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

@extends('adminlte::page')

@section('content_header')

@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Senarai Peserta Program</h3>
        </div>
        <div class="box-body">
            <table id="programTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Bil</th>
                        <th>Nama Program</th>
                        <th>Tarikh</th>
                        <th>Tempat</th>
                        <th>Status Program</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($senaraiProgram as $program)
                        <tr>
                            <td> {{ $i++ }}</td>
                            <td> {{ $program->nama_program }} </td>
                            <td> {{ $program->tarikh_mula->format('d.m.Y') }} </td>
                            <td> {{ $program->tempatProgram->nama_tempat }} </td>
                            <td>
                                <ul>
                                    <li>
                                        @if ($program->status_aktif)
                                            <small class="label bg-green">Program Dibuka</small>
                                        @else
                                            <small class="label bg-red">Program Ditutup</small>
                                        @endif
                                    </li>
                                    <li>
                                        @if ($program->status_penyertaan)
                                            <small class="label bg-green">Penyertaan Dibuka</small>
                                        @else
                                            <small class="label bg-red">Penyertaan Ditutup</small>
                                        @endif
                                    </li>
                                    <li>
                                        @if ($program->status_kehadiran)
                                            <small class="label bg-green">Kehadiran Dibuka</small>
                                        @else
                                            <small class="label bg-red">Kehadiran Ditutup</small>
                                        @endif
                                    </li>
                                </ul>
                            </td>
                            <td width="50px">

                                @if(Route::is('program.senarai-peserta'))
                                    <a href="{{ route('show.senarai.peserta', ['id' => $program->id_program]) }}"
                                        class="btn btn-primary btn-block">Lihat Senarai</a>
                                @endif

                                @if(Route::is('program.permohonan-peserta'))
                                    <a href="{{ route('senarai.permohonan.peserta', ['id' => $program->id_program]) }}"
                                        class="btn btn-primary btn-block">Lihat Permohonan</a>
                                @endif

                                @if(Route::is('program.kehadiran-peserta'))
                                    <a href="{{ route('program.kehadiran', ['id' => $program->id_program]) }}"
                                        class="btn btn-primary btn-block">Lihat Kehadiran</a>
                                    <a href="{{ route('program.qrcode-kehadiran', ['id' => $program->id_program]) }}"
                                        class="btn btn-info btn-block" target="_blank">Jana Kod QR</a>
                                    @php
                                        $message = urlencode("Sila daftar kehadiran $program->nama_program di pautan berikut : " . route('program.pengesahan-kehadiran', ['uuid' => $program->qrcode_kehadiran]));
                                    @endphp
                                    <a href="https://wa.me/?text={{ $message }}" class="btn btn-success btn-block"
                                        target="_blank">Kongsi Pautan</a>
                                @endif
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

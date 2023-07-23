@extends('adminlte::page')

@section('content_header')

@stop

@section('css')

@endsection

@section('content')

    <div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-red">
            <h3 class="widget-user-username" align="center">
                @php
                    use Jenssegers\Agent\Agent;
                    
                    $agent = new Agent();
                @endphp
                @if ($agent->isDesktop())
                    Program Pembangunan Modal Insan (e-PMI)
                @else
                    Program Pembangunan Modal Insan (e-PMI)
                @endif


            </h3>

        </div>
        <div class="widget-user-image" style="margin-top: 10px">
            <img class="img-circle" src="{{ asset('favicon.ico') }}" style="padding: 10px;">
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-md-12 border-right">
                    <marquee>
                        <h4>SELAMAT DATANG KE SISTEM E-PMI</h4>
                    </marquee>
                </div>
            </div>
        </div>
    </div>


    @role(['superadmin', 'urusetia', 'pengurusan'])
        <div class="box box-primary">
            <div class="box-header with-border">
                <center>
                    <h3 class="box-title"><b>SISTEM PENGURUSAN E-PPST</b></h3>
                </center>

            </div>
            <div class="box-body">
                <section class="section1">
                    <section class="content">
                        <!-- Info boxes -->
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-aqua"><i class=" fa fa-database"></i></span>

                                    <div class="info-box-content">
                                        <h4><a href="{{ route('program.index') }}">Senarai Program</a></h4>
                                        <span class="info-box-number">
                                            {{ $jumlah_program }}
                                            <br>
                                            <div style="font-size: 12px">PROGRAM DISEDIAKAN</div>

                                        </span>

                                    </div>

                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-red"><i class="m-icon fa fa-laptop"></i></span>

                                    <div class="info-box-content">
                                        <h4><a href="{{ route('senarai.program.aktif') }}">Senarai Program Aktif</a></h4>
                                        <span class="info-box-number">
                                            {{ $jumlah_program_aktif }}
                                            <br>
                                            <div style="font-size: 12px">PROGRAM AKTIF</div>
                                        </span>

                                    </div>

                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->

                            <!-- fix for small devices only -->
                            <div class="clearfix visible-sm-block"></div>

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-green"><i class=" fa fa-user"></i></span>

                                    <div class="info-box-content">
                                        <h4><a href="{{ route('senarai.pengguna') }}">Jumlah Pengguna</a></h4>
                                        <span class="info-box-number">
                                            {{ $jumlah_pengguna }}
                                            <br>
                                            <div style="font-size: 12px">PENGGUNA BERDAFTAR</div>
                                        </span>

                                    </div>

                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->


                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-yellow"><i class=" fa fa-edit"></i></span>

                                    <div class="info-box-content">
                                        <h4><a href="{{ route('pengurusan_program') }}">Jumlah Arkib Program</a></h4>
                                        <span class="info-box-number">

                                            {{ $jumlah_program_arkib }}
                                            <br>
                                            <div style="font-size: 12px">PROGRAM YANG TELAH TAMAT</div>
                                        </span>

                                    </div>

                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->




                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="info-box">

                                    <span class="info-box-icon bg-secondary"><i class=" fa fa-money-bill-wave"></i></span>

                                    <div class="info-box-content">
                                        <h4><a href="{{ route('belanjawan.index') }}">Kewangan Program</a></h4>
                                        <span class="info-box-number">
                                            RM {{ number_format($jumlah_belanjawan, 2) }}
                                            <br>
                                            <div style="font-size: 12px">KEWANGAN PROGRAM TAHUN {{ date('Y') }}</div>
                                        </span>

                                    </div>

                                    <!-- /.info-box-content -->
                                </div>

                                <!-- /.info-box -->
                            </div>

                            <!-- /.col -->

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="info-box">

                                    <span class="info-box-icon bg-blue"><i class=" fa fa-chart-bar"></i></span>

                                    <div class="info-box-content">
                                        <h4><a href="#">Jumlah Peserta</a></h4>
                                        <span class="info-box-number">
                                            {{ $jumlah_peserta }}
                                            <br>
                                            <div style="font-size: 12px">PESERTA PROGRAM PPST</div>
                                        </span>

                                    </div>

                                    <!-- /.info-box-content -->
                                </div>

                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                        </div>

                    </section>
                </section>
            </div>
        </div>
    @endrole

    @role('individu')

        <div class="box box-primary">
            <div class="box-header">
                <center>
                    <h3 class="box-title"><b>SENARAI PROGRAM</b></h3>
                </center>
            </div>
            <hr>
            <div class="box-body">


                <div class="container-fluid">
                    @forelse ($senaraiProgramAktifChunk as $programChunk)
                        <div class="row">
                            @foreach ($programChunk as $program)
                                <div class="col col-md-6">
                                    <div class="container-fluid well">
                                        <div class="images">
                                            <a href="{{ asset('storage/lampiran/' . $program->poster_program) }}"
                                                target="_blank">
                                                <img src="{{ asset('storage/lampiran/' . $program->poster_program) }}"
                                                    style="max-height: 200px" class="img-responsive">
                                            </a> <br><br>
                                        </div>

                                        <font color=indigo font face='verdana' size='3px'><b> {{ $program->nama_program }}
                                            </b></font>
                                        <br> <br>

                                        <font color=red <i class='fa fa-calendar'></i></font>
                                        <font face=verdana size='2pt'><b>TARIKH: </b></font>
                                        <br> &nbsp;&nbsp;&nbsp;&nbsp;
                                        {{ \Carbon\Carbon::parse($program->tarikh_mula)->format('d/m/Y') }} -
                                        {{ \Carbon\Carbon::parse($program->tarikh_akhir)->format('d/m/Y') }}

                                        <br> <br>

                                        <font color=red <i class='fa fa-hourglass-half'></i></font>
                                        <font face=verdana size='2pt'><b>&nbsp;MASA: </b></font><br>
                                        <font face=verdana size='2px'> &nbsp;&nbsp;&nbsp;&nbsp;{{ $program->masa }} </font>
                                        <br> <br>

                                        {{-- <font color=red <i class='fa fa-users'></i></font>
              <font face=verdana size='2pt'><b>&nbsp;JUMLAH PESERTA: </b></font><br>
              <font face=verdana size='2px'> &nbsp;&nbsp;&nbsp;&nbsp;{{ $program->jumlah_peserta }} orang </font>
              <br> <br> --}}

                                        <font color=red <i class='fa fa-quote-left'></i></font>
                                        <font face=verdana size='2pt'><b>&nbsp;OBJEKTIF: </b></font><br>
                                        <font face=verdana size='2px'> &nbsp;&nbsp;&nbsp;&nbsp;{{ $program->objektif }}
                                        </font>
                                        <br> <br>

                                        {{-- <font color=red <i class='fa fa-quote-left' ></i></font> <font face=verdana size='2pt'><b>&nbsp;IMPAK: </b></font><br>
              <font face=verdana size='2px'> &nbsp;&nbsp;&nbsp;&nbsp;{{ $program->impak }} </font>  
              <br> <br>
  
              <font face=verdana size='2pt'><b>MAKLUMAT TAMBAHAN: </b></font><br>
              <font face=verdana size='2px'>{{ $program->maklumat_tambahan ?? 'Tiada'}} </font>  
              <br><br> --}}


                                        <a href="{{ route('program.show', ['id' => $program->id_program]) }}"
                                            class="btn btn-info">Perincian</a>

                                        @role(['urusetia', 'superadmin'] && !checkTarikhProgram($program))
                                            @if ($program->tempat == 7)
                                                <a href="{{ route('program.join-zoom', ['id' => $program->id_program]) }}"
                                                    class="btn btn-primary"
                                                    @if (!$agent->isDesktop()) target="_blank" @endif>Test Live Zoom</a>
                                            @endif
                                        @endrole

                                        @if ($program->senaraiPermohonanPesertaDiterima()->find(auth()->user()->id_pengguna))
                                            @if (checkTarikhProgram($program))
                                                {{-- Jika tempat program secara maya papar butang zoom meeting --}}
                                                @if ($program->tempat == 7)
                                                    <a href="{{ route('program.join-zoom', ['id' => $program->id_program]) }}"
                                                        class="btn btn-primary"
                                                        @if (!$agent->isDesktop()) target="_blank" @endif>Join Live
                                                        Zoom</a>
                                                @endif

                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th><strong>Kehadiran Hari Ini:</strong></th>
                                                            <td>
                                                                @if (!$program->kehadiranSemasaProgram()->find(auth()->user()->id_pengguna))
                                                                    Sila Dapatkan Link Kehadiran Daripada Urusetia Untuk Daftar
                                                                    Kehadiran
                                                                @else
                                                                    <small class="label bg-green">Telah Hadir</small>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th> <strong>Kaji Selidik:</strong></th>
                                                            <td>

                                                                @if (checkTarikhAkhirProgram($program))
                                                                    @if (!$program->kehadiranSemasaProgram()->find(auth()->user()->id_pengguna))
                                                                        <small class="label bg-yellow">Sila Daftar Kehadiran
                                                                            Dahulu</small>
                                                                    @elseif ($program->senaraiPesertaTelahJawabKajiSelidik()->find(auth()->user()->id_pengguna))
                                                                        <small class="label bg-green">Terima Kasih Telah
                                                                            Menjawab Kaji Selidik</small>
                                                                    @else
                                                                        <a href="{{ route('create.peserta.kajiselidik', ['idProgram' => $program->id_program]) }}"
                                                                            class="btn btn-warning">Jawab Kaji Selidik</a>
                                                                    @endif
                                                                @else
                                                                    <small class="label bg-yellow">Kaji Selidik Belum
                                                                        Dibuka</small>
                                                                @endif

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Sijil:</th>
                                                            <td>
                                                                @if (checkTarikhAkhirProgram($program))
                                                                    @if (!$program->kehadiranSemasaProgram()->find(auth()->user()->id_pengguna))
                                                                        <small class="label bg-yellow">Sila Daftar Kehadiran
                                                                            Dahulu</small>
                                                                    @elseif ($program->senaraiPesertaBelumJawabKajiSelidik()->find(auth()->user()->id_pengguna))
                                                                        <small class="label bg-yellow">Sila Jawab Kaji Selidik
                                                                            Dahulu</small>
                                                                    @elseif ($program->senaraiPesertaTidakHadir()->find(auth()->user()->id_pengguna))
                                                                        Sijil Tidak Dapat Dijana Kerana Anda Tidak Hadir Atau
                                                                        Hadir Sebahagian Hari Program
                                                                    @else
                                                                        <a href="{{ route('program.sijil', ['url_sijil' => $program->senaraiPesertaTelahJawabKajiSelidik()->find(auth()->user()->id_pengguna)->senarai_peserta->url_sijil]) }}"
                                                                            class="btn btn-success" target="_blank">Muat Turun
                                                                            Sijil Penyertaan</a>
                                                                    @endif
                                                                @else
                                                                    Sijil Boleh Dimuat Turun Pada Hari Akhir Program
                                                                @endif

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            @else
                                                <a href="" class="btn btn-success" onclick="return false">Permohonan
                                                    Diterima</a>
                                            @endif
                                        @elseif ($program->senaraiPermohonanPeserta()->find(auth()->user()->id_pengguna))
                                            <a href="" class="btn btn-warning" onclick="return false">Permohonan Dalam
                                                Proses</a>
                                        @else
                                            @php
                                                $i = 0;
                                            @endphp
                                            @if (!checkLepasTarikhProgram($program))
                                            @php
                                                $id = Crypt::encryptString($program->id_program);
                                            @endphp
                                                <a class="btn btn-danger" target="blank"
                                                    href="{{ route('borang.peserta.individu', ['id' => $id]) }}"
                                                    role="button">Borang Permohonan</a>
                                                {{-- <a href="{{ route('mohon.peserta.individu', ['id' => $program->id_program]) }}"
                                                    class="btn btn-primary pengesahan" onclick="return false">Mohon Sertai
                                                    Program</a> --}}
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary " data-toggle="modal"
                                                    data-target="#sertaiKursus">
                                                    Mohon Sertai
                                                    Program
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="sertaiKursus" tabindex="-1" role="dialog"
                                                    aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="modal-title">Pengesahan Penyertaan</h3>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form
                                                                action="{{ route('mohon.peserta.individu', ['id' => $program->id_program]) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="container-fluid">
                                                                        <div class="form-group mt-3">
                                                                            Sila muatnaik borang permohonan yang telah disahkan
                                                                            untuk teruskan permohonan.
                                                                        </div>
                                                                        <div class="form-group mt-3">
                                                                            <label for="borang">Borang <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="file" class="form-control-file"
                                                                                name="borang" id="borang" placeholder=""
                                                                                aria-describedby="fileHelpIdborang">
                                                                            <small id="fileHelpIdborang"
                                                                                class="form-text text-muted">Borang berformat
                                                                                PDF dan saiz tidak melebihi 1MB.</small> <br>
                                                                            @error('borang')
                                                                                <span id="fileHelpIdborang"
                                                                                    class="form-text text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Teruskan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                        @if ($errors->has('borang'))
                                            @php
                                                $i = 1;
                                            @endphp
                                        @endif
                                        <br> <br>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @empty
                        <p>
                        <h5>Tiada Program Dibuka</h5>
                        </p>
                    @endforelse
                </div>
            </div>
        @endrole
    @stop
    @section('js')
        <script>
            $(document).ready(function() {
                $('.pengesahan').click(function() {
                    hapus = Swal.fire({
                        title: 'Pengesahan Penyertaan!',
                        text: 'Klik Teruskan untuk mohon.',
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

            var add = {{ $i }};
            if (add == 1) {
            $(document).ready(function() {
                $("#sertaiKursus").modal('show');
            });
        }

            $('#sertaiKursus').on('show.bs.modal', event => {
                var button = $(event.relatedTarget);
                var modal = $(this);
                // Use above variables to manipulate the DOM

            });
        </script>
    @endsection

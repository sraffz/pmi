<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Senarai Peserta {{ $program->nama_program }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .table tr td {
            vertical-align: middle;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: bold;
        }

        .table tr th {
            vertical-align: middle;
            text-transform: uppercase;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class=" ">
        <div class="row">
            @php
                $tempat = DB::table('tempat_program')->where('id', $program->tempat)->first();
            @endphp
            <div class="col-md-12 text-center">
                {{-- <h3 style="text-transform: uppercase">Senarai Permohonan Perjalanan Pegawai Awam Ke Luar Negara Secara Individu</h3> --}}
                <h5 class="box-title" style="text-transform: uppercase">Senarai Peserta Program </strong> </h5>
                <h3 class="box-title" style="text-transform: uppercase"><strong>{{ $program->nama_program }}</strong> </h3>
                <h6 class="box-title" style="text-transform: uppercase"><strong>Tarikh : {{ \Carbon\Carbon::parse($program->tarikh_mula)->format('d M Y') }} - {{ \Carbon\Carbon::parse($program->tarikh_akhir)->format('d M Y') }}</strong> </h6>
                <h6 class="box-title" style="text-transform: uppercase"><strong>Masa : {{ $program->masa }}</strong> </h6>
                <h6 class="box-title" style="text-transform: uppercase"><strong>Tempat : {{ $tempat->nama_tempat }}</strong> </h6>
                <br>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Bil.</th>
                            <th>Nama Peserta</th>
                            <th>Jawatan & Gred</th>
                            <th>Jabatan</th>
                            <th>No Telefon</th>
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
                                <td>{{ $peserta->nama_penuh }}</td>
                                <td>{{ $peserta->skim }} ({{ $peserta->gred_kod . '' . $peserta->gred }})</td>
                                <td>{{ $jabatan->nama_jabatan }}</td>
                                <td>{{ $peserta->no_telefon }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>

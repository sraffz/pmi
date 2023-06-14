<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Kod QR Kehadiran</title>
    <style>
        .tajuk1 {
            font-size: 18pt;
            text-align: center;
        }
        .tajuk2 {
            font-size: 15pt;
            text-align: center;
        }
    </style>
</head>
<body>
    <p style="text-align: center; padding-bottom: 10"><span class="tajuk1"> <b>Sila Imbas Kod QR Untuk Daftar Kehadiran</b> </span></p>
    <p style="text-align: left"><span class="tajuk2">Nama Program: <b>{{ $program->nama_program }}</b> </span></p>
    <p style="text-align: left"><span class="tajuk2">Tarikh Program: <b>{{ $program->tarikh_mula->format('d / m / Y') }}</b></span></p>
    <p><span>{!! $qrcode !!}</span></p>
</body>
</html>
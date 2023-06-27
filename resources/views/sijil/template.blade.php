<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Sijil</title>

    <style>
        body {
            background-image: url('{{ public_path('storage/template/sijil_3.png') }}');
            background-repeat: no-repeat;
            background-image-resize: 6;
        }
        .nama {
            font-size: 15pt;
        }
        .kp {
            font-size: 14pt;
        }
        .nama-program {
            font-size: 15pt;
        }
        .tempat-program {
            font-size: 15pt;
        }
        .tarikh-program {
            font-size: 15pt;
        }
        .nama-penganjur{
            font-size: 10pt;
        }
        .penganjur{
            font-size: 10pt;
        }
    </style>
</head>
<body>
    <p style="text-align: right; padding-right: 7%; padding-top: 7%;">{!! $qrcode !!}</p>
    <p style="padding-top: 35%;  text-align: center; "> 
        <strong><span class="nama">{{ strtoupper($peserta->nama_penuh) }}</span> </strong>
        <br>
        <strong><span class="kp">{{ $peserta->no_kad_pengenalan }}</span> </strong>
    </p>
    <p style="padding-top: 10%;text-align: center"> 
        <strong><span class="nama-program">{{ $program->nama_program }}</span> </strong>
        
    </p>
    <p style="padding-top: 8%;text-align: center"> 
        <strong><span class="tempat-program">
            @if($program->tarikh_mula == $program->tarikh_akhir)
                {{ $program->tarikh_mula->format('d/m/Y') }}
            @else
                {{ $program->tarikh_mula->format('d/m/Y') }} - {{ $program->tarikh_akhir->format('d/m/Y') }}
            @endif
        </span> </strong>
        
    </p>
    <p style="padding-top: 7%;text-align: center"> 
        <strong>
         <span class="tarikh-program">
            {{ $program->tempatProgram->nama_tempat }}
            
            
        </span>   
        </strong>
        
    </p> 
    <p style="padding-top: 15%; text-align: center">
        <strong>
            <span class="nama-penganjur"><i>Sijil ini adalah cetakan komputer dan tidak memerlukan tandatangan.</i></span>
        </strong>
    </p>
    {{-- <p style="padding-top: 8%;padding-right: 29%; text-align: center">
        <strong>
        <span class="nama-penganjur">{{ Config::get('sijil.nama') }}</span> <br>
        <span class="nama-penganjur">{{ Config::get('sijil.darjah') }}</span> <br>
        <span class="penganjur">{{ Config::get('sijil.jawatan_l1') }}</span> <br>
        <span class="penganjur">{{ Config::get('sijil.jawatan_l2') }}</span> <br>
        <span class="penganjur">{{ Config::get('sijil.jawatan_l3') }}</span>    
        </strong>
    </p> --}}
    {{-- <p style="padding-top: 1%;text-align: center"> 
        <span class="nama-program">Anjuran</span>  <br>
        <span class="nama-program" style="padding-top: 2%">{{ $program->anjuran }}</span> 
    </p> --}}


</body>
</html>
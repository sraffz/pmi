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
    <table width="100%" style="padding-top: 6%;">
        <tr>
            <td style="text-align: center; padding-left: 32%;font-size: 20px;font-weight: bold">
                <img src="{{ asset('images/suk.png') }}" class="img-fluid" height="130px">  <br>
                
            </td>
            <td style="text-align: right; padding-right: 7%; padding-top: 3%;">
                {!! $qrcode !!}
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;  font-size: 20px;font-weight: bold ; padding-top: 1%">
                        KERAJAAN NEGERI KELANTAN
            </td>
        </tr>
    </table>
    <p style="padding-top: 5%; text-align: center; padding-left: 10%; padding-right: 10%;"> 
        Dengan ini disahkan bahawa <br><br>
        <strong><span class="nama">{{ strtoupper($peserta->nama_penuh) }}</span> </strong>
        <br>
        <strong><span class="kp">(K/P: {{ $peserta->no_kad_pengenalan }})</span> </strong>
    </p>
    <p style="padding-top: 3%; padding-left: 10%; padding-right: 10%;text-align: center; align-content: center" width="80%"> 
        telah hadir dengan jayanya <br><br>
        <strong><span class="nama-program">{{ $program->nama_program }}</span> </strong>
        
    </p>
    <p style="padding-top: 3%;text-align: center"> 
       yang diadakan pada <br><br>
        <strong><span class="tempat-program">
            @if($program->tarikh_mula == $program->tarikh_akhir)
                {{ $program->tarikh_mula->format('d/m/Y') }}
            @else
                {{ $program->tarikh_mula->format('d/m/Y') }} - {{ $program->tarikh_akhir->format('d/m/Y') }}
            @endif
        </span> </strong>
        
    </p>
    <p style="padding-top: 3%;text-align: center;padding-left: 10%; padding-right: 10%;"> 
        bertempat di <br><br>
        <strong>
         <span class="tarikh-program">
            {{ $program->tempatProgram->nama_tempat }}
            
            
        </span>   
        </strong>
        
    </p> 
    <table width="100%">
        <tr>
            <td style="text-align: center; font-weight: bold; width: 55%; padding-top: 5%;">
                <img src="{{ asset('images/cop-sijil-bpsm.png') }}" class="img-fluid" height="150px">  <br>
                
            </td>
            <td style="text-align: center; padding-right: 7%; padding-top: 10%;">
                <span style="font-size: 12px;"><strong>( HAJI MOHD ZAKI BIN YUSOFF)</strong> </span><br>
                    <span style="font-size: 11px;">
                        Pengarah <br>
                    Bahagian Pengurusan Sumber Manusia <br>
                    Pejabat Setiausaha Kerajaan Negeri Kelantan
                        </span>
            </td>
        </tr>
    </table>
    <p style="padding-top: 3%; text-align: center">
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
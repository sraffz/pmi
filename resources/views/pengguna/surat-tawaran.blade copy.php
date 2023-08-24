<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Penyertaan {{ $program->nama_program }}</title>

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}

    <style>
        body {
            margin-top: 1cm;
            margin-bottom: 1cm;
            margin-left: 0.5cm;
            margin-right: 0.5cm;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10.5px;
        }

        .tajuk {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
        }

        .break {
            page-break-before: always;
        }

        #table td {
            vertical-align: top;
        }


        ,
        #table th {
            border: 1px solid rgb(54, 54, 54);
            padding: 5px;
            font-size: 12px;
        }

        #thead-dark {
            background: rgb(41, 41, 41);
            color: rgb(255, 255, 255);
        }

        .table-borderless {
            border: 1px solid rgb(255, 255, 255);
            /* padding: 5px; */
            /* font-size: 12px; */
        }

        h2 {
            font-size: 12px;
            margin-top: 0.3em;
            margin-bottom: 0.0em;
        }

        td {
            padding-left: 10px;
            padding-top: 5px;
            padding-bottom: 5px;
            padding-right: 10px;
            vertical-align: top;
            text-transform: uppercase;
        }

        .td-normal {
            padding-left: 3px;
            padding-top: 3px;
            padding-bottom: 0px;
            padding-right: 3px;
            vertical-align: top;
            text-transform: uppercase;
            font-size: 10px;
        }

        .isi {
            font-size: 14px;
            font-weight: :bold;
        }

        table {
            border-collapse: collapse;
            text-transform: uppercase;
            width: 100%;
        }

        footer {
            position: fixed;
            bottom: -30px;
            left: 0px;
            right: 0px;
            height: 50px;

            /** Extra personal styles **/
            background-color: #ffffff;
            color: rgb(0, 0, 0);
            text-align: center;
            line-height: 35px;
        }
    </style>
</head>

<body>
    {{-- <footer>
       <i>Borang ini adalah janaan komputer dan tidak memerlukan tandatangan. </i> 
    </footer> --}}

    <p align="center"><img src="{{ asset('images/suk.png') }}" width="" height="120" alt="User Image"
            align="center"><br></p>
    <p style="text-transform: uppercase; font-size:17px" align="center">
        <strong>
            JEMPUTAN MENGHADIRI {{ $program->nama_program }}
        </strong>
    </p>

    <div class="text-center">
        <table id="table" class="table table-bordered table-sm" border="1">
            <thead class="thead-dark">
                <tr>
                    <th style="background-color: #a50202; color: #ffffff" colspan="2" class="text-left">MAKLUMAT PEMOHON</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($program->senaraiPermohonanPeserta as $id => $peserta) --}}
                    <tr>
                        <td class="text-left" style="width: 30%"><strong>Nama Pegawai</strong> </td>
                        <td class="text-left"><strong>{{ Auth::user()->nama_penuh }}</strong> </td>
                    </tr>
                    <tr>
                        <td class="text-left" style="width: 30%"><strong>No. Kad Pengenalan</strong> </td>
                        <td class="text-left"><strong>{{ Auth::user()->no_kad_pengenalan }}</strong> </td>
                    </tr>
                    <tr>
                        <td class="text-left" style="width: 30%"><strong>Jawatan</strong> </td>
                        <td class="text-left"><strong>{{ Auth::user()->skim }}
                                {{ Auth::user()->gred_kod }}{{ Auth::user()->gred }}</strong> </td>
                    </tr>
                {{-- @endforeach --}}
            </tbody>
        </table>
        <br><br>
        <table id="table" class="table table-bordered table-sm" border="1">
            <thead class="thead-dark">
                <tr>
                    <th style="background-color: #a50202; color: #ffffff" colspan="2" class="text-left">MAKLUMAT PROGRAM</th>
                </tr>
            </thead>
            <tbody>
                     <tr>
                        <td class="text-left" style="width: 30%"><strong>Nama Program</strong> </td>
                        <td class="text-left"><strong>{{ $program->nama_program }}</strong> </td>
                    </tr>
                    <tr>
                        <td class="text-left" style="width: 30%"><strong>Tarikh</strong> </td>
                        <td class="text-left">
                            <strong>{{ \Carbon\Carbon::parse($program->tarikh_mula)->format('d/m/Y') }} -
                                {{ \Carbon\Carbon::parse($program->tarikh_akhir)->format('d/m/Y') }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left" style="width: 30%"><strong>Masa</strong> </td>
                        <td class="text-left"><strong>{{ $program->masa }} </strong> </td>
                    </tr>
                    <tr>
                        <td class="text-left" style="width: 30%"><strong>Tempat</strong> </td>
                        <td class="text-left"><strong>{{ $program->tempatProgram->nama_tempat }} </strong> </td>
                    </tr>
                    <tr>
                        <td class="text-left" style="width: 30%"><strong>Anjuran</strong> </td>
                        <td class="text-left"><strong>{{ $program->anjuran }} </strong> </td>
                    </tr>
                    <tr>
                        <td class="text-left" style="width: 30%"><strong>Deskripsi Program</strong> </td>
                        <td class="text-left"><strong>{{ $program->deskripsi_program }} </strong> </td>
                    </tr>
                    <tr>
                        <td class="text-left" style="width: 30%"><strong>Objektif Program</strong> </td>
                        <td class="text-left"><strong>{{ $program->objektif }} </strong> </td>
                    </tr>
                    <tr>
                        <td class="text-left" style="width: 30%"><strong>Impak Program</strong> </td>
                        <td class="text-left"><strong>{{ $program->impak }} </strong> </td>
                    </tr>
                    <tr>
                        <td class="text-left" style="width: 30%"><strong>Maklumat Tambahan Program</strong> </td>
                        <td class="text-left"><strong>{{ $program->maklumat_tambahan }} </strong> </td>
                    </tr>
                   
             </tbody>
        </table>
        <br><br>
        <table id="table" class="table table-bordered table-sm" border="1">
            <thead class="thead-dark">
                <tr>
                    <th style="background-color: #a50202; color: #ffffff" colspan="2" class="text-left">PENGESAHAN KETUA JABATAN</th>
                </tr>
            </thead>
            <tbody> 
                <tr>
                    <td>
                        <br><br><br><br><br><br>Tandatangan : _________________________________________________________<br>&nbsp;
                    </td>
                    
                    <td>
                        <br><br><br><br><br><br> Tarikh: ___________________________________________________<br>&nbsp;
                    </td>
                </tr>
            </tbody>
        </table>







            {{-- <table class="table table-bordered table-sm">
            <thead class="thead-dark">
                <tr>
                    <th class="text-left">PERAKUAN PEMOHON</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-left">
                        @if ($permohonan->tick == 'yes')
                            <strong>1) Saya dengan ini memenuhi segala peraturan yang ditetapkan di perenggan 6 (i),
                                (ii) dan perenggan 10 Surat Pekeliling Am Bilangan 3 tahun 2021</strong>
                            <br><br>
                            <strong>2) Saya dengan ini mengisytiharkan segala maklumat yang diberikan adalah benar.
                                Sekiranya didapati maklumat ini tidak benar, saya boleh diambil tindakan mengikut
                                peraturan sedia ada.</strong>
                        @endif
                        <br><br>
                        <strong>Tarikh Permohonan :
                            {{ \Carbon\Carbon::parse($permohonan->created_at)->format('d/m/Y') }}</strong>
                    </td>
                </tr>
            </tbody>
        </table> --}}
    </div>

    {{-- <br>
    <div class="text-center">
        <p style="font-size: 11pt">
            <i> Borang ini adalah janaan komputer dan tidak memerlukan tandatangan.</i>
        </p>
    </div> --}}

</body>

</html>

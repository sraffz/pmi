<?php

namespace App\Http\Controllers\Apps;

use App\Models\DaftarProgram;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ProgramController extends Controller
{
    public function senaraiProgram(Request $request)
    {
        // $penggunaWujud = User::where('no_kad_pengenalan', $request->no_kad_pengenalan)->exists();
        $pengguna = Auth::user();
        $senaraiProgram = Program::with('tempatProgram')->where('status_aktif', 1)->get()->toArray();
        $newSenaraiProgram = collect();

        foreach ($senaraiProgram as $program ) {
            
            array_forget($program,'qrcode_kehadiran');
            array_forget($program,'id_pendaftar');
            array_forget($program,'tempat');
            array_forget($program,'kuota_peserta');
            array_forget($program,'jumlah_peserta');
            array_forget($program,'pengurus_program');
            array_forget($program,'objektif');
            array_forget($program,'anjuran');
            array_forget($program,'deskripsi_program');
            array_forget($program,'jenis_program');
            array_forget($program,'golongan_sasar');
            array_forget($program,'impak');
            array_forget($program,'maklumat_tambahan');
            array_forget($program,'kumpulan_limit');
            array_forget($program,'kumpulan_tarikh_akhir');
            array_forget($program,'status_aktif');
            array_forget($program,'status_penyertaan');
            array_forget($program,'status_kehadiran');
            array_forget($program,'created_at');
            array_forget($program,'updated_at');
            array_forget($program,'deleted_at');
            array_forget($program,'tempat_program.id');
            array_forget($program,'tempat_program.created_at');
            array_forget($program,'tempat_program.updated_at');
            

            $idPengguna = $pengguna->id_pengguna;
            $penggunaTelahDaftar = DaftarProgram::where('id_program', $program['id_program'])->where('id_pengguna', $idPengguna)->whereNull('tarikh_batal')->exists();
            $statusPendaftaran = ($penggunaTelahDaftar) ? 1 : 0;
            if($penggunaTelahDaftar)
            {
                $penggunaTelahDisahkan = DaftarProgram::where('id_program', $program['id_program'])->where('id_pengguna', $idPengguna)->where('status_pengesahan', true)->exists();

                $statusPendaftaran = ($penggunaTelahDisahkan) ? 2 : $statusPendaftaran;
            }

            $program = array_add($program, 'status_pendaftaran', $statusPendaftaran);
            

            $tarikhProgram = Carbon::parse($program['tarikh_mula'])->format('d/m/Y');

            if($program['tarikh_mula'] = $program['tarikh_akhir'])
            {
                $program = array_add($program, 'tarikh', $tarikhProgram);
            }
            else
            {
                $tarikhAkhirProgram = Carbon::parse($program['tarikh_akhir'])->format('d/m/Y');
                $program = array_add($program, 'tarikh', $tarikhProgram.' - '.$tarikhAkhirProgram);
            }

            array_forget($program,'tarikh_mula');
            array_forget($program,'tarikh_akhir');
        
            $newSenaraiProgram->push($program);
        }
        
        $data = [
            'senaraiProgram' => $newSenaraiProgram,
            // 'status' => 1,
        ];

        return Response::json($newSenaraiProgram);
    }

    public function daftarPenyertaanProgram(Request $request)
    {
        $pengguna = Auth::user();
        $program = Program::find($request->id_program);

        if ($program->status_penyertaan == 0) {
            $message = 'Permohonan penyertaan telah ditutup';
            $status = 0;
            $data = [
                'message' => $message,
                'status' => $status
            ];
    
            return Response::json($data);
            
        }

        if(checkLepasTarikhProgram($program))
        {
            $message = 'Penyertaan hanya dibuka sebelum dan semasa program.';
            $status = 0;
            $data = [
                'message' => $message,
                'status' => $status
            ];
    
            return Response::json($data);
        }

        if (!$program->senaraiPermohonanPeserta()->find($pengguna->id_pengguna)) 
        {
            $status_pengesahan = (checkTarikhProgram($program)) ? 1 : 0;
            if(checkTarikhProgram($program))
            {
                $status_pengesahan =  1;
                $program->increment('jumlah_peserta');
            }
            else
            {
                $status_pengesahan =  0;
            }

            $program->pesertaBatal()->detach($pengguna);
            $pengguna->senaraiProgramKeseluruhan()->attach($program->id_program, ['tarikh_daftar' => Carbon::now(), 'status_pengesahan' => $status_pengesahan]);

            $message = 'Permohonan diterima';
            $status = 1;
        
        }
        else 
        {
            $message = 'Permohonan telah dibuat, hanya satu permohonan dibenarkan';
            $status = 0;
        }

        
        $data = [
            'message' => $message,
            'status' => $status
        ];

        return Response::json($data);
    }

    public function batalPenyertaanProgram(Request $request)
    {
        $pengguna = Auth::user();
        $program = Program::find($request->id_program);

        if(checkLepasTarikhProgram($program))
        {
            $message = 'Pembatalan hanya boleh dibuat sebelum dan semasa program.';
            $status = 0;
            $data = [
                'message' => $message,
                'status' => $status
            ];
    
            return Response::json($data);
        }

        if ($pengguna->senaraiProgramKeseluruhan()->find($program->id_program)) 
        {
            $pengguna->senaraiProgramKeseluruhan()->updateExistingPivot($program->id_program, ['tarikh_batal' => Carbon::now()]);
            $program->decrement('jumlah_peserta');

            $message = 'Permohonan telah dibatalkan';
            $status = 1;
        }
        
        $data = [
            'message' => $message,
            'status' => $status
        ];

        return Response::json($data);
    }

}

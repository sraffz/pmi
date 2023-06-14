<?php

namespace App\Http\Controllers;

use App\Models\DaftarProgram;
use App\Models\Kehadiran;
use App\Models\Program;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PublicController extends Controller
{
    public function sijil($url_sijil)
    {
        $ada = DaftarProgram::where('url_sijil', $url_sijil)->get();
        if($ada->isEmpty())
        {
            Log::warning("Public Url : Cubaan akses url sijil tanpa sah");
            return abort(404);
        }

        $kajiselidik = DaftarProgram::where('url_sijil', $url_sijil)->first()->status_kajiselidik;
        if(!$kajiselidik)
        {
            Log::warning("Public Url : Cubaan akses url sijil tanpa sah, kajiselidik belum dilengkapkan");
            return abort(404);
        }

        $idProgram = DaftarProgram::where('url_sijil', $url_sijil)->first()->id_program;
        $idPeserta = DaftarProgram::where('url_sijil', $url_sijil)->first()->id_pengguna;
   
        $program = Program::find($idProgram);
        $peserta = User::find($idPeserta);
      
        $qrcode = QrCode::size(100)->generate(route('pengesahan.sijil',['url_sijil' => $url_sijil]));

        $qrcode = str_replace('<?xml version="1.0" encoding="UTF-8"?>','',$qrcode);
        
        $data = [
            'program' => $program,
            'peserta' => $peserta,
            'qrcode' => $qrcode,
        ];

        $pdf = PDF::loadView('sijil.template', $data);

	    return $pdf->stream('document.pdf');
        
    }

    public function pengesahanKehadiran($uuid)
    {
        $program = Program::where('qrcode_kehadiran', $uuid)->first();

        if (is_null($program)) {
            Log::warning("Public Link : Pautan pengesahan kehadiran tidak sah");

            return abort(404);
        }

        $data = [
            'program' => $program,
        ];

        return view('kehadiran.pengesahan', $data);
    }

    public function daftarKehadiran($id, Request $request)
    {
        $program = Program::find($id);
        $peserta = User::where('no_kad_pengenalan', $request->no_kad_pengenalan)->first();

        
        if(!checkTarikhProgram($program))
        {
            Alert::error('','Pendaftaran hanya dibenarkan pada hari program.');
        }
        else if(is_null($peserta)) {
            Alert::error('','No Kad Pengenalan yang dimasukkan belum berdaftar dalam sistem, sila daftar akaun terlebih dahulu.');
        }
        else if(!Hash::check($request->password,$peserta->katalaluan))
        {
            Alert::error('','Katalaluan yang dimasukkan tidak sah.');
        }
        else
        {
            if($program->kehadiranSemasaProgram()->where('pengguna.id_pengguna', $peserta->id_pengguna)->exists())
            {
                Alert::info('','Anda telah mendaftar kehadiran untuk hari ini.');    
            }
            else
            {
                $program->kehadiranSemasaProgram()->attach($peserta->id_pengguna);


                $period = CarbonPeriod::since($program->tarikh_mula)->days(1)->until($program->tarikh_akhir);

                $kehadiran = collect([]);
                foreach ($period as $date) {
                    $flag = Kehadiran::where('id_program', $program->id_program)->where('id_pengguna', $peserta->id_pengguna)->where('created_at','LIKE', $date->format('Y-m-d').'%')->exists();
                    $kehadiran->push($flag);
                }

                $kehadiranPenuh = 0;

                if($kehadiran->contains(true) && !$kehadiran->contains(false))
                {
                    $kehadiranPenuh = 1; //Hadir
                }

                if($kehadiran->contains(true) && $kehadiran->contains(false))
                {
                    $kehadiranPenuh = 2; // Hadir Sebahagian
                }

                if($program->senaraiPesertaKeseluruhan()->where('pengguna.id_pengguna', $peserta->id_pengguna)->exists())
                {
                    $program->senaraiPesertaKeseluruhan()->updateExistingPivot($peserta->id_pengguna, ['status_pengesahan' => 1, 'status_kehadiran' => $kehadiranPenuh]); 
                }
                else
                {
                    $program->senaraiPesertaKeseluruhan()->attach($peserta->id_pengguna, ['tarikh_daftar' => Carbon::now(),'status_pengesahan' => 1, 'status_kehadiran' => $kehadiranPenuh]);
                    $program->increment('jumlah_peserta');
                    
                } 
                Alert::success('','Pendaftaran kehadiran anda berjaya.');
            }
            
            
            
        }
        

        return redirect()->back();
    }

    public function shareProgram($uuid)
    {
        $program  = Program::where('qrcode_kehadiran', $uuid)->first();

        $data = [
            'program' => $program,
        ];

        return view('program.share', $data);
    }
}

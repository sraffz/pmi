<?php

namespace App\Http\Controllers;

use App\Models\GambarProgram;
use App\Models\Makluman;
use App\Models\Program;
use Illuminate\Http\Request;
use DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $senaraiProgram = Program::with('tempatProgram')->where('status_aktif', 1)->orderBy('tarikh_mula')->take(5)->get();
        $senaraiGambar = GambarProgram::with('program')->latest()->take(10)->get()->random(3);
        $senaraiMakluman = Makluman::latest()->get();
        $jenis_program = Program::with('tempatProgram')->where('status_aktif', 1)->distinct()->get(['jenis_program']);

        $data = [
            'senaraiProgram' => $senaraiProgram,
            'senaraiGambar' => $senaraiGambar,
            'senaraiMakluman' => $senaraiMakluman,
            'jenis_program' => $jenis_program
        ];

        return view('welcome', $data);
    }

    public function index2()
    {
        $senaraiProgram = Program::with('tempatProgram')->where('status_aktif', 1)->orderBy('tarikh_mula')->get();

        $data = [
            'senaraiProgram' => $senaraiProgram
        ];

        return view('welcome2', $data);
    }

    public function katalog()
    {
        $senaraiProgram = Program::with('tempatProgram')->where('status_aktif', 1)->orderBy('tarikh_mula')->get();
        $jenis_program = Program::with('tempatProgram')->select('jenis_program', DB::raw('count(*) as bilangan'))->where('status_aktif', 1)->groupBy('jenis_program')->get();

        $data = [
            'senaraiProgram' => $senaraiProgram,
            'jenis_program' => $jenis_program
        ];

        return view('katalog', $data);
    }

    public function takwim()
    {
        return view('takwim');
    }

    public function butiranKursus(Request $request)
    {
        $program = Program::with('tempatProgram')->where('id_program', $request->id_program)->first();
        // dd($program);

        return view('program.butiran-kursus', compact('program'));
    }

    public function carianKursus(Request $request)
    {

        // dd($request->all());

        $cari = $request->carian;

        $senaraiProgram = Program::with('tempatProgram')->where('nama_program', 'LIKE', '%' . $cari . '%')->where('status_aktif', 1)->orderBy('tarikh_mula')->get();
        $jenis_program = Program::with('tempatProgram')->select('jenis_program', DB::raw('count(*) as bilangan'))->where('status_aktif', 1)->groupBy('jenis_program')->get();

        $data = [
            'senaraiProgram' => $senaraiProgram,
            'jenis_program' => $jenis_program
        ];

        return view('katalog', $data);
    }
}

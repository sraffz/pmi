<?php

namespace App\Http\Controllers;

use App\Models\Belanjawan;
use App\Models\DaftarProgram;
use App\Models\Program;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agent = new Agent();

        // dd($agent, Auth::user()->peranan);
        if (Auth::user()->hasRole(['superadmin', 'urusetia', 'pengurusan'])) {
            $data = array(
                'jumlah_pengguna' => User::all()->except([1])->count(),
                'jumlah_program' => Program::count(),
                'jumlah_program_aktif' => Program::where('status_aktif', 1)->count(),
                'jumlah_program_arkib' => Program::onlyTrashed()->count(),
                'jumlah_belanjawan' => Belanjawan::whereYear('created_at', '=', date('Y'))->sum('jumlah'),
                'jumlah_peserta' => DaftarProgram::whereNull('tarikh_batal')->where('status_pengesahan', 1)->count(),
                'senaraiProgramAktifChunk' => Program::senarai_program_aktif()->chunk(2),
                'agent' => $agent,
            );
        } else if (Auth::user()->hasRole('individu')) {




            $data = array(
                'senaraiProgramAktifChunk' => Program::senarai_program_aktif()->chunk(2),
                'agent' => $agent,
            );
        }

        return view('home', $data);
    }

    
}

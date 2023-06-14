<?php

namespace App\Http\Controllers;

use App\Models\PenilaianPenceramah;
use App\Models\Penceramah;
use Illuminate\Http\Request;

class PenilaianPenceramahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function _construct()
    {
        $this->middleware('auth');//utk check samada user tu login @ x
    }
    public function index()
    {
        //echo 'controller pengguna'
        //return view('kaji-selidik.index');
        //$senaraiKajiSelidik = Program::find(1)->senaraiKajiSelidikPengguna;
        //dd($senaraiKajiSelidik);
        
        $senaraiPenilaianPenceramah = Penceramah::with('senaraiPenilaianProgram')->get();
        //$senaraiKajiSelidik = KajiSelidik::all();
                //dd($senaraiKajiSelidik);
//$sum=0;
foreach ($senaraiPenilaianPenceramah as $penceramah)
{
                    dd($senaraiPenilaianPenceramah);

    foreach($penceramah->senaraiPenilaianProgram as $program){
            //$sum += $pengguna->kaji_selidik->penilaian_keseluruhan;
            $program->penilaian_penceramah;
     

        }
    die();

        $data = [
            'senaraiPenilaianPenceramah' => $senaraiPenilaianPenceramah,
            ];
            
            return view('penilaian-penceramah.index', $data);
            //return view('kaji-selidik.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}
    public function create()
    {
        $data = array();

        //return view('kaji-selidik.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KajiSelidik  $kajiSelidik
     * @param  \App\Penceramah  $penceramah
     * @return \Illuminate\Http\Response
     */
    public function show(KajiSelidik $kajiSelidik)
    {
        echo 'show user';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KajiSelidik  $kajiSelidik
     * @param  \App\Penceramah  $penceramah
     * @return \Illuminate\Http\Response
     */
    public function edit(KajiSelidik $kajiSelidik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KajiSelidik  $kajiSelidik
     * @param  \App\Penceramah  $penceramah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KajiSelidik $kajiSelidik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KajiSelidik  $kajiSelidik
     * @param  \App\Penceramah  $penceramah
     * @return \Illuminate\Http\Response
     */
    public function destroy(KajiSelidik $kajiSelidik)
    {
        //
    }
}

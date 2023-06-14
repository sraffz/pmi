<?php

namespace App\Http\Controllers;
use App\Models\Belanjawan; //import model Belanjawan
use App\Http\Controllers\Controller;
use App\Http\Requests\BelanjawanRequest;
use App\Models\Program;
use Alert;

class BelanjawanController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $senaraiProgram = Program::with('belanjawan')->get(); 

        $data = [
            'senaraiProgram'=> $senaraiProgram,
        ];  
       
    
        return view('belanjawan.index',$data);
    }


    public function edit($id)
    {
        $belanjawan = Belanjawan::find($id);

        $data= [
            'belanjawan'=> $belanjawan,
            
        ];

        return view('belanjawan.edit',$data);
    }


    public function update(BelanjawanRequest $request, $id)
    {
        $bayaran_makanan = ($request->bayaran_makanan == "") ? 0 : $request->bayaran_makanan;
        $bayaran_cenderahati = ($request->bayaran_cenderahati == "") ? 0 : $request->bayaran_cenderahati;
        $bayaran_penceramah = ($request->bayaran_penceramah == "") ? 0 : $request->bayaran_penceramah;
        $bayaran_fasilitator = ($request->bayaran_fasilitator == "") ? 0 : $request->bayaran_fasilitator;
        $bayaran_penginapan = ($request->bayaran_penginapan == "") ? 0 : $request->bayaran_penginapan;
        $bayaran_tempat = ($request->bayaran_tempat == "") ? 0 : $request->bayaran_tempat;
        $bayaran_tiket = ($request->bayaran_tiket == "") ? 0 : $request->bayaran_tiket;
        $bayaran_sijil = ($request->bayaran_sijil == "") ? 0 : $request->bayaran_sijil;
        $bayaran_tiraiBelakang = ($request->bayaran_tiraiBelakang == "") ? 0 : $request->bayaran_tiraiBelakang;
        $bayaran_lain = ($request->bayaran_lain == "") ? 0 : $request->bayaran_lain;

        $jumlah = $bayaran_makanan +
                    $bayaran_cenderahati +
                    $bayaran_penceramah +
                    $bayaran_fasilitator +
                    $bayaran_penginapan +
                    $bayaran_tempat +
                    $bayaran_tiket +
                    $bayaran_sijil +
                    $bayaran_tiraiBelakang +
                    $bayaran_lain;

        $belanjawan = Belanjawan::find($id)->update($request->only(
            'butiran_makanan',
            'butiran_cenderahati',
            'butiran_penceramah',
            'butiran_makanan',
            'butiran_fasilitator',
            'butiran_penginapan',
            'butiran_tempat',
            'butiran_tiket',
            'butiran_sijil',
            'butiran_tiraiBelakang',
            'butiran_lain'
            ) + [
                'bayaran_makanan' => $bayaran_makanan,
                'bayaran_cenderahati' => $bayaran_cenderahati,
                'bayaran_penceramah' => $bayaran_penceramah,
                'bayaran_fasilitator' => $bayaran_fasilitator,
                'bayaran_penginapan' => $bayaran_penginapan,
                'bayaran_tempat' => $bayaran_tempat,
                'bayaran_tiket' => $bayaran_tiket,
                'bayaran_sijil' => $bayaran_sijil,
                'bayaran_tiraiBelakang' => $bayaran_tiraiBelakang,
                'bayaran_lain' => $bayaran_lain,
                'jumlah' => $jumlah
            ]);

        if($belanjawan)
        {
            Alert::success('Rekod belanjawan berjaya dikemaskini');
        } 
        else
        {
            Alert::error('Rekod belanjawan berjaya dikemaskini');
        }   
 
        return redirect()->back();
    }

      
}

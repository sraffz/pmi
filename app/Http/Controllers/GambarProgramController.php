<?php

namespace App\Http\Controllers;
use App\Models\GambarProgram;
use App\Models\Program;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Alert;

class GambarProgramController extends Controller
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
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        #/variable
         $senaraiGambarProgram = Program::all();//utk tarik data drp model
        //dd($senaraiGambarProgram);
         $data =['senaraiGambarProgram' => $senaraiGambarProgram,];//utk hantar data ke view
         return view('gambar_program.index',$data);
        
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gambar.*' => 'required|file|max:10485760|image',
        ],[
            'gambar.*.required' => 'Sila pilih gambar untuk disimpan',
            'gambar.*.image' => 'Hanya format gambar sahaja diterima',
            'gambar.*.file' => 'Hanya format gambar sahaja diterima',
            'gambar.*.max' => 'Setiap fail hendaklah tidak melebihi 10MB',
        ])->validate();

        $program = Program::find($id);

        $folder = Str::slug($program->nama_program, '-');

        if($request->hasFile('gambar'))
        {
            $senaraiGambar = $request->file('gambar');
            
            foreach ($senaraiGambar as $gambar ) {
                $program->senaraiGambar()->create([
                    'lokasi' => Storage::disk('lampiran')->putFile($folder, $gambar)
                ]);    
            }
            
        }

        Alert::success('Gambar berjaya disimpan');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GambarProgram  $gambar_program
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Program::find($id);
        $senaraiGambar = $program->senaraiGambar;

        $data = [
            'program' => $program,
            'senaraiGambar' => $senaraiGambar
        ];

        return view('gambar_program.show', $data);
    }



     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GambarProgram  $gambar_program
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gambarProgram = GambarProgram::findOrFail($id);

        Storage::disk('lampiran')->delete($gambarProgram->lokasi);
        $gambarProgram = $gambarProgram->delete();
        
        return redirect()->back();
    }

}

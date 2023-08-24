<?php

namespace App\Http\Controllers;

use App\Models\JenisProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class JenisProgramController extends Controller
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
    
    public function index()
    {
        $data = array(
            'senarai_jenis_program' => JenisProgram::all(),
        );

        return view('jenis_program.index', $data);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'nama_jenis' => 'required',
        ])->validate();

        $jenis_program = JenisProgram::create($request->all());

        Alert::success('Berjaya disimpan.');

        return redirect()->route('jenis_program.index');
    }


    public function delete($id)
    {
        $jenis_program = JenisProgram::findOrFail($id);
        $jenis_program = $jenis_program->delete();

        Alert::success('Berjaya dihapus.');

        return redirect()->back();
        
    }

    public function edit($id) 
    {
        $jenis_program = JenisProgram::find($id);

        $data = [
            'jenis_program' => $jenis_program
        ];
        
        return view('jenis_program.edit',$data);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(),[
            'nama_jenis' => 'required',
        ])->validate();

       $jenis_program = JenisProgram::find($id)->update($request->all());

       Alert::success('Berjaya dikemaskini.');

        return redirect()->route('jenis_program.index');
    }

    public function create()
    {
        return view('jenis_program.create');
    }

}

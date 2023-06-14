<?php

namespace App\Http\Controllers;

use App\Models\TempatProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TempatProgramController extends Controller
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
            'senarai_tempat_program' => TempatProgram::all(),
        );

        return view('tempat_program.index', $data);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'nama_tempat' => 'required',
        ])->validate();

        $tempat_program = TempatProgram::create($request->all());

        Alert::success('Berjaya disimpan.');

        return redirect()->route('tempat_program.index');
    }


    public function delete($id)
    {
        $tempat_program = TempatProgram::findOrFail($id);
        $tempat_program = $tempat_program->delete();

        Alert::success('Berjaya dihapus.');

        return redirect()->back();
        
    }

    public function edit($id) 
    {
        $tempat_program = TempatProgram::find($id);

        $data = [
            'tempat_program' => $tempat_program
        ];
        
        return view('tempat_program.edit',$data);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(),[
            'nama_tempat' => 'required',
        ])->validate();

       $tempat_program = TempatProgram::find($id)->update($request->all());

       Alert::success('Berjaya dikemaskini.');

        return redirect()->route('tempat_program.index');
    }

    public function create()
    {
        return view('tempat_program.create');
    }

}

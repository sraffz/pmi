<?php

namespace App\Http\Controllers;

use App\Models\Penceramah;
use App\Http\Controllers\Controller;
use App\Http\Requests\PenceramahRequest;
use Alert;
use Illuminate\Support\Facades\Storage;

class PenceramahController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function _construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $senaraiPenceramah = Penceramah::all();
        $data = [
            'senaraiPenceramah' => $senaraiPenceramah,
        ];
        
        return view('penceramah.index',$data);
    }

    public function edit($id) 
    {
        $penceramah = Penceramah::find($id);

        $data = [
            'penceramah' => $penceramah
        ];
        
        
        return view('penceramah.edit',$data);
    }
        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('penceramah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenceramahRequest $request)
    {
        $path = "";
        if($request->hasFile('lampiran_ic'))
        {
            $path = Storage::disk('lampiran')->putFile('penceramah', $request->file('penceramah'));
        }

        $penceramah = Penceramah::create($request->except('lampiran_ic') + ['lampiran_ic' => $path]);
        
        if($penceramah)
        {
            Alert::success('Rekod Berjaya Disimpan');
        }
        else
        {
        Alert::error('Rekod Tidak Berjaya Disimpan');
        }

        return redirect()->route('penceramah.index');
    }

        
    public function update(PenceramahRequest $request, $id)
    {
       $penceramah = Penceramah::find($id)->update($request->all());
    
               
       if($penceramah)
       {
            Alert::success('Berjaya dikemaskini');
       }
       else
       {
        Alert::error('Tidak Berjaya dikemaskini');
       }

        return redirect()->back();
    }

    
    public function destroy($id_penceramah)
    {
        $penceramah = Penceramah::findOrFail($id_penceramah)->delete();
        
        if($penceramah)
        {
            Alert::success('Berjaya dihapus');
        }
        else
        {
            Alert::error('Tidak Berjaya dihapus');
       }

        return redirect()->route('penceramah.index');
    }


}
?>
<?php

namespace App\Http\Controllers;

use App\Models\Makluman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class MaklumanController extends Controller
{
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
        $data = array(
            'senarai_makluman' => Makluman::all(),
        );

        return view('makluman.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('makluman.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'tajuk' => 'required',
            'keterangan' => 'required',
        ])->validate();

        $makluman = Makluman::create($request->all());

        Alert::success('Berjaya disimpan.');

        return redirect()->route('makluman.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Makluman  $makluman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $makluman = Makluman::find($id);

        $data = [
            'makluman' => $makluman
        ];
        
        return view('makluman.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Makluman  $makluman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(),[
            'tajuk' => 'required',
            'keterangan' => 'required',
        ])->validate();

       $makluman = Makluman::find($id)->update($request->all());

       Alert::success('Berjaya dikemaskini.');

        return redirect()->route('makluman.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Makluman  $makluman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $makluman = Makluman::findOrFail($id);
        $makluman = $makluman->delete();

        Alert::success('Berjaya dihapus.');

        return redirect()->back();
    }
}

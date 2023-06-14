<?php

namespace App\Http\Controllers;

use App\Http\Requests\KehadiranRequest;
use App\Models\User;
use Alert;
class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengguna = User::find($id);
    
    
        $data= [
            'pengguna'=> $pengguna,
            
        ];
        return view('kehadiran.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function update(KehadiranRequest $request, $id)
    {
        $pengguna = User::find($id)->update($request->all());
        
        if($pengguna)
        {
            Alert::success('Rekod Berjaya Disimpan');
           
        }

        else
        {
            Alert::error('Rekod Tidak Berjaya Disimpan');
        
        }
        return redirect()->back();
    }

   


}
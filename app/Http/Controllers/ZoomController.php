<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Zoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Jenssegers\Agent\Agent;
use RealRashid\SweetAlert\Facades\Alert;

class ZoomController extends Controller
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

    public function joinZoom($id)
    {
        $agent = new Agent();
        
        $program = Program::find($id);

        $data = [
            'program' => $program
        ];

        if($agent->isDesktop())
        {
            return view('zoom._web-view-jwt', $data);
        }
        else
        {
            return redirect()->away($program->zoom->url);
        }

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Zoom  $zoom
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(Zoom::where('id_program', $id)->exists())
        {
            $zoom = Program::find($id)->zoom;
        }
        else
        {
            Zoom::create(['id_program' => $id]);
            $zoom = Program::find($id)->zoom;
        }

        $data = [
            'zoom' => $zoom,
        ];

        return view('zoom.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Zoom  $zoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zoom $zoom)
    {
        Validator::make($request->all(), [
            'url' => 'required|url',
            'meeting_code' => 'required|digits_between:10,11',
            'pass_code' => 'required|digits_between:1,16'
        ])->validate();

        $zoom->update($request->all());

        Alert::success('Berjaya disimpan');

        return redirect()->back();
    }

}

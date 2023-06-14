@extends('adminlte::page')
@section('content')

@php
    dd($senaraiKajiSelidik);
@endphp 


<table>
    <tr>
    <th>ID PENGGUNA</th>
    <th>NAMA PENUH</th>
    <th>GRED JAWATAN</th>
    <th>CADANGAN</th>
    </tr>

    <tfoot>
        <tbody>
            @foreach ($senaraiKajiSelidik as $program)
       
                            {{-- dd($senaraiKajiSelidik); --}}

            @foreach($program->senaraiKajiSelidikProgram as $user){
          {{-- @foreach ($senaraiKajiSelidik as $kajiSelidik) --}}
              <tr>
                  <td>{{$user->kaji_selidik->id_pengguna}}</td>
                  <td>{{$user->kaji_selidik->nama_penuh}}</td>                    
                  <td>{{$user->kaji_selidik->gred_jawatan}}</td>                    
                  <td>{{$user->kaji_selidik->cadangan}}</td>                            
              </tr>
          @endforeach
          @endforeach
    </tbody>
    </tfoot>
</table>
@stop

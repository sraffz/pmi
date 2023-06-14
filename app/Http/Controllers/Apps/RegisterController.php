<?php

namespace App\Http\Controllers\Apps;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KategoriPengguna;
use App\Models\User;
use Illuminate\Support\Facades\Response;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $status = 1;

        if(User::where('no_kad_pengenalan', $request->no_kad_pengenalan)->exists())
        {
            $message = 'No kad Pengenalan Telah Wujud';
            $status = 0;

            $data = [
                'message' => $message,
                'status' => $status
            ];

            return Response::json($data);
        }

        if(User::where('email', $request->email)->exists())
        {
            $message = 'Email Telah Wujud';
            $status = 0;

            $data = [
                'message' => $message,
                'status' => $status
            ];

            return Response::json($data);
        }

        if(User::where('no_telefon', $request->no_telefon)->exists())
        {
            $message = 'No Telefon Telah Wujud';
            $status = 0;

            $data = [
                'message' => $message,
                'status' => $status
            ];

            return Response::json($data);
        }

        if(!preg_match("/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&].{11,}/", $request->katalaluan))
        {
            $message = 'Katalaluan hendaklah terdiri daripada 12 aksara, 1 simbol, 1 huruf besar dan kecil serta 1 nombor';
            $status = 0;

            $data = [
                'message' => $message,
                'status' => $status
            ];

            return Response::json($data);
        }

        if(!KategoriPengguna::where('id_kategori_pengguna', $request->kategori)->exists())
        {
            $message = 'Sila Pilih Kategori';
            $status = 0;

            $data = [
                'message' => $message,
                'status' => $status
            ];

            return Response::json($data);
        }

        if($status == 1)
        {
            $penggunaBaru = User::create([
                'nama_penuh' => $request->nama_penuh,
                'nama_singkatan' => $request->nama_singkatan,
                'no_kad_pengenalan' => $request->no_kad_pengenalan,
                'email' => $request->email,
                'no_telefon' => $request->no_telefon,
                'alamat' => $request->alamat,
                'kategori' => $request->kategori,
                'status_perakui_sah' => 1,
                'katalaluan' => bcrypt($request->katalaluan),
            ]);

            if($penggunaBaru)
            {
                $message = 'Pendaftaran Berjaya, sila logmasuk';
                $status = 1;
            }
            else
            {
                $message = 'Pendaftaran Tidak Berjaya';
                $status = 0;
            }
        }

        $data = [
            'message' => $message,
            'status' => $status
        ];

        return Response::json($data);
    }
}

<?php

namespace App\Http\Controllers\Apps;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PermintaanLupaKatalaluan;
use App\Models\User;
use Carbon\CarbonInterval;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use GuzzleHttp\Client;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        $pengguna = User::where('no_kad_pengenalan', $request->nokp)->exists();
        $penggunaWujud = [];

        if($pengguna)
        {
            $hashedPassword = User::where('no_kad_pengenalan', $request->nokp)->first()->katalaluan;
            if (Hash::check($request->katalaluan, $hashedPassword)) {
                $penggunaWujud = User::where('no_kad_pengenalan', $request->nokp)->first();
                

                if($penggunaWujud->status_aktif)
                {
                    Auth::attempt(['no_kad_pengenalan' => $request->nokp, 'password' => $request->katalaluan, 'status_aktif' => 1]);
                    $token = Auth::user()->createToken('eppstApp')->accessToken;

                    array_forget($penggunaWujud,'id_pendaftar');
                    array_forget($penggunaWujud,'status_perakui_sah');
                    array_forget($penggunaWujud,'status_aktif');
                    array_forget($penggunaWujud,'status_katalaluan');
                    array_forget($penggunaWujud,'akhir_logmasuk');
                    array_forget($penggunaWujud,'created_at');
                    array_forget($penggunaWujud,'updated_at');
                    array_forget($penggunaWujud,'deleted_at');

                    $penggunaWujud = array_add($penggunaWujud, 'api_token', $token);

                    $message = 'Berjaya';
                    $status = 1;
                }
                else
                {
                    $penggunaWujud = [];
                    $message = 'Akaun Tidak Aktif, Sila Hubungi Urusetia';
                    $status = 0;
                }
            }
            else
            {
                $message = 'Katalaluan Tidak Sepadan';
                $status = 0;
            }
            
        }
        else
        {
            $message = 'Pengguna Tidak Wujud';
            $status = 0;
        }

        

        $data = [
            'pengguna' => $penggunaWujud,
            'message' => $message,
            'status' => $status
        ];

        return Response::json($data);
    }

    public function logout()
    {
      if (Auth::user()) 
      {
        Auth::user()->token()->revoke();

        $message = 'Log Keluar Berjaya';
        $status = 1;

        }

        $data = [
            'message' => $message,
            'status' => $status
        ];

        return Response::json($data);
    }

    public function forgotPassword(Request $request)
    {
        $pengguna = User::where('no_kad_pengenalan', $request->no_kad_pengenalan)->exists();

        if($pengguna)
        {
            $penggunaWujud = User::where('no_kad_pengenalan', $request->no_kad_pengenalan)->first();
            $newPassword = 'user@EPPST'.rand(1985,now()->year);
            $messageSMS = "Katalaluan baru e-PPST bagi No K/P : ".$penggunaWujud->no_kad_pengenalan." seperti berikut : ".$newPassword;
            

            if(preg_match("/^[0][1][0-9]{8}$/", $penggunaWujud->no_telefon)
                || preg_match("/^[0][1]{2}[0-9]{8}$/", $penggunaWujud->no_telefon))
            {

                $noPhoneSMS = "+6".$penggunaWujud->no_telefon;
                $hiddenNumber = substr_replace($penggunaWujud->no_telefon, '*****', 3, 5);

                $adaPermintaan = PermintaanLupaKatalaluan::where('no_kad_pengenalan',$request->no_kad_pengenalan)
                    ->where('no_telefon', $noPhoneSMS)->exists();


                if($adaPermintaan)
                {
                    

                    $tempohPermintaan = PermintaanLupaKatalaluan::where('no_kad_pengenalan',$request->no_kad_pengenalan)
                    ->where('no_telefon', $noPhoneSMS)->limit(3)->latest()->first()->created_at->diffInSeconds(now());

                    //300 saat = 5 minit
                    $bakiMasa = CarbonInterval::seconds(300 - $tempohPermintaan)->cascade()->forHumans();
                    
                    if($tempohPermintaan <= 300)
                    {
                        $message = "Anda boleh membuat permintaan semula selepas $bakiMasa";
                        $status = 2;
                        
                    }
                    else
                    {
                        $penggunaWujud->update(['katalaluan' => Hash::make($newPassword), 'status_katalaluan' => false]);

                        $this->sendSMS($messageSMS, $noPhoneSMS);

                        $this->saveSmsrequestRecord($request->no_kad_pengenalan, $noPhoneSMS, $request->session()->get('_token'), request()->ip());

                        $message = 'SMS bagi katalaluan baru telah dihantar ke nombor berikut '.$hiddenNumber;
                        $status = 1;
                    }
                }
                else
                {

                    $penggunaWujud->update(['katalaluan' => Hash::make($newPassword), 'status_katalaluan' => false]);

                    $this->sendSMS($messageSMS, $noPhoneSMS);

                    $this->saveSmsrequestRecord($request->no_kad_pengenalan, $noPhoneSMS, $request->session()->get('_token'), request()->ip());

                    $message = 'SMS bagi katalaluan baru telah dihantar ke nombor berikut '.$hiddenNumber;
                    $status = 1;
                }
                
            }
            else if(preg_match("/^[6][0][1][0-9]{8}$/", $penggunaWujud->no_telefon) 
            || preg_match("/^[6][0][1]{2}[0-9]{8}$/", $penggunaWujud->no_telefon)
            )
            {
                $noPhoneSMS = "+".$penggunaWujud->no_telefon;
                $hiddenNumber = substr_replace($penggunaWujud->no_telefon, '*****', 3, 5);

                $adaPermintaan = PermintaanLupaKatalaluan::where('no_kad_pengenalan',$request->no_kad_pengenalan)
                    ->where('no_telefon', $noPhoneSMS)->exists();


                if($adaPermintaan)
                {
                    

                    $tempohPermintaan = PermintaanLupaKatalaluan::where('no_kad_pengenalan',$request->no_kad_pengenalan)
                    ->where('no_telefon', $noPhoneSMS)->limit(3)->latest()->first()->created_at->diffInSeconds(now());

                    //300 saat = 5 minit
                    $bakiMasa = CarbonInterval::seconds(300 - $tempohPermintaan)->cascade()->forHumans();
                    
                    if($tempohPermintaan <= 300)
                    {
                        $message = "Anda boleh membuat permintaan semula selepas $bakiMasa";
                        $status = 2;
                    }
                    else
                    {
                        $penggunaWujud->update(['katalaluan' => Hash::make($newPassword), 'status_katalaluan' => false]);

                        $this->sendSMS($messageSMS, $noPhoneSMS);

                        $this->saveSmsrequestRecord($request->no_kad_pengenalan, $noPhoneSMS, $request->session()->get('_token'), request()->ip());

                        $message = 'SMS bagi katalaluan baru telah dihantar ke nombor berikut '.$hiddenNumber;
                        $status = 1;
                    }
                }
                else
                {
                    $penggunaWujud->update(['katalaluan' => Hash::make($newPassword), 'status_katalaluan' => false]);

                    $this->sendSMS($messageSMS, $noPhoneSMS);

                    $this->saveSmsrequestRecord($request->no_kad_pengenalan, $noPhoneSMS, $request->session()->get('_token'), request()->ip());

                    $message = 'SMS bagi katalaluan baru telah dihantar ke nombor berikut '.$hiddenNumber;
                    $status = 1;
                }
            }
            else
            {
                $message = 'Permintaan tukar katalaluan tidak dapat diproses';
                $status = 0;
            }
        }
        else
        {
            $message = 'Permintaan tukar katalaluan tidak dapat diproses';
            $status = 0;
        }

        $data = [
            'message' => $message,
            'status' => $status
        ];

        return Response::json($data);
    }

    public function sendSMS($message, $no_telefon)
    {
        $client = new Client();

        $res = $client->request('POST', 'https://mysmsdvsb.azurewebsites.net/api/messages', [
            'headers' => [
                'Authorization' => env('MYSMS_API_KEY'),
                'Content-Type' => 'application/json'
            ],
            'json' => [
                'keyword' => 'KEL',
                'message' => $message,
                'msisdn' => $no_telefon,
            ],
            
        ]);
    }

    public function saveSmsrequestRecord($ic, $nophone, $token, $ip)
    {
        PermintaanLupaKatalaluan::create([
            'no_kad_pengenalan' => $ic,
            'no_telefon' => $nophone,
            'token' => $token,
            'ip' => $ip,
        ]);
    }
}

<?php

use App\Models\Kehadiran;
use App\Models\Program;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Log;

if (! function_exists('checkHadir')) 
{
    function checkHadir($id_program, $id_pengguna) {
        $program = Program::find($id_program);
        $period = CarbonPeriod::since($program->tarikh_mula)->days(1)->until($program->tarikh_akhir);

        $kehadiran = collect([]);
        foreach ($period as $date) {
            $flag = Kehadiran::where('id_program', $program->id_program)->where('id_pengguna', $id_pengguna)->where('created_at','LIKE', $date->format('Y-m-d').'%')->exists();
            $hadir = ($flag) ? '<span class="label bg-green">Hadir</span>' : '<span class="label bg-red">Tidak Hadir</span>';
            $kehadiran->put($date->format('d.m.Y') , $hadir);
        }

        return $kehadiran;
    }
}

/**
 * Untuk generate signature untuk kegunaan Zoom  Meeting
 * 
 */
if (! function_exists('generate_signature_zoom')) 
{
    function generate_signature_zoom ( $meeting_number, $role = 0)
    {

        // role = 0 => participant
        // role = 1 => host

        $api_key = env('ZOOM_MEETING_API_KEY');
        $api_secret = env('ZOOM_MEETING_SECRET_KEY');

        //Set the timezone to UTC
        date_default_timezone_set("UTC");
      
        $time = time() * 1000 - 30000;//time in milliseconds (or close enough)
        
        $data = base64_encode($api_key . $meeting_number . $time . $role);
        
        $hash = hash_hmac('sha256', $data, $api_secret, true);
        
        $_sig = $api_key . "." . $meeting_number . "." . $time . "." . $role . "." . base64_encode($hash);
        
        //return signature, url safe base64 encoded
        return rtrim(strtr(base64_encode($_sig), '+/', '-_'), '=');
    }
}

/**
 * Untuk generate jwt untuk kegunaan Zoom  Meeting
 * 
 */
if (! function_exists('generate_jwt_zoom')) 
{
    function generate_jwt_zoom ( $meeting_number, $role = 0)
    {

        // role = 0 => participant
        // role = 1 => host

        $sdk_key = env('ZOOM_MEETING_SDK_KEY');
        $sdk_secret = env('ZOOM_MEETING_SDK_SECRET');

        //Set the timezone to UTC
        date_default_timezone_set("UTC");

        // Create token header as a JSON string
        $header = json_encode([
                'typ' => 'JWT', 
                'alg' => 'HS256'
            ]);

        // Create token payload as a JSON string
        $payload = json_encode([
                "appKey" => $sdk_key,
                "sdkKey" => $sdk_key,
                "mn" => $meeting_number,
                "role" => $role,
                "iat" => time(),
                "exp" => strtotime('+1 day'),
                "tokenExp" => strtotime('+1 day')
            ]);
        
        // Encode Header to Base64Url String
        $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

        // Encode Payload to Base64Url String
        $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
        
        // Create Signature Hash
        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $sdk_secret, true);

        // Encode Signature to Base64Url String
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
        
        // Create JWT
        $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
        
        return $jwt;
    }
}


/**
 * Untuk Check Tarikh Semasa Antara Tarikh Mula dan Tarikh Akhir
 * 
 * @param model $program Model Program required
 * @return bool true jika tarikh semasa antara tarikh mula dan akhir program
 */
if (! function_exists('checkTarikhProgram')) 
{
    function checkTarikhProgram($program)
    {
        $startDate = Carbon::parse($program->tarikh_mula);
        $endDate = Carbon::parse($program->tarikh_akhir);
        
        return Carbon::today()->between($startDate,$endDate);
        
    }
}

/**
 * Untuk Check Tarikh Semasa Sama Dengan Tarikh Akhir
 * 
 * @param model $program Model Program required
 * @return bool true jika tarikh semasa sama tarikh akhir program
 */
if (! function_exists('checkTarikhAkhirProgram')) 
{
    function checkTarikhAkhirProgram($program)
    {
        return Carbon::parse($program->tarikh_akhir)->isSameDay();
        
    }
}

/**
 * Untuk Check Tarikh Semasa Sudah Lepas Tarikh Akhir Program
 * 
 * @param model $program Model Program required
 * @return bool true jika tarikh semasa sudah lepas tarikh akhir program
 */
if (! function_exists('checkLepasTarikhProgram')) 
{
    function checkLepasTarikhProgram($program)
    {
        return (checkTarikhAkhirProgram($program)) ? false : Carbon::parse($program->tarikh_akhir)->isPast();
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class PenggunaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        $pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*?[#?!@$%^&*-]).{8,}";
        return [
            'no_kad_pengenalan' => "required|digits:12|unique:pengguna,no_kad_pengenalan,".$this->input('id').',id_pengguna',
            // 'katalaluan' => "required|confirmed|sometimes",
            'katalaluan' => "",
            // 'no_telefon' => "required|string|max:15|min:10",
            'no_telefon' => "",
            'email' => "required|email",
            // 'kategori' => 'required|digits',
            'kategori' => '',
            'nama_penuh' => 'required|string|max:225',
            'nama_singkatan' =>'required',
            // 'alamat' => 'required|string|max:100',
            'alamat' => '',

        ];
    }
}

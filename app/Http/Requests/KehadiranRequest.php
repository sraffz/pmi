<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KehadiranRequest extends FormRequest
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
        return [
            'nama_penuh' => 'required|string|max:50',
            'no_kad_pengenalan' => 'required|digits:12',
            'email' => 'required|email',
            'no_telefon' => 'string',
            'kategori' => 'required|digits_between:1,3',
            'alamat' => 'required|string|max:100',
        ];
    }
}

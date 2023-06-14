<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenceramahRequest extends FormRequest
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
            'nama_penceramah' =>'sometimes|string',
            'no_kad_pengenalan' => 'sometimes|digits:12|unique:penceramah',
            'no_telefon' => 'required|string|max:15',
            'alamat1' =>'',
            'alamat2' =>'',
            'alamat3' =>'',
            'poskod'=>'',
            'bandar'=>'',
            'negeri'=>'',

        ];
    }
}

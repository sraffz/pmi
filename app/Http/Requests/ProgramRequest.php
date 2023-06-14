<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramRequest extends FormRequest
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
            
            'nama_program'=> 'required',
            'anjuran'=> 'required',
            'deskripsi_program'=>'required',
            'tarikh_mula'=> 'required',
            'tarikh_akhir'=>'required',
            'masa'=>'required',
            'golongan_sasar'=>'required',
            'kuota_peserta'=>'required|numeric',
            'pengurus_program'=>'required',
            'objektif'=>'required|string|max:225',
            'impak'=>'required|string|max:225',
            'jenis_program' => 'required',
            'tempat' => 'required',
            'yuran' => 'required',
            'penceramah' => 'required',
            'poster_program' => 'required_if:haspic,true|file|max:5120|mimes:jpeg,jpg,png'

        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'poster_program.max' => 'Size fail tidak boleh melebihi 5 MB',
            'poster_program.mimes' => 'Jenis fail yang dibenarkan hanya jpeg, jpg, png',
        ];
    }
}

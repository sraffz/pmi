<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BelanjawanRequest extends FormRequest
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
            'bayaran_makanan' => 'nullable|numeric',
            'butiran_makanan' =>'nullable|string',
            'bayaran_cenderahati' => 'nullable|numeric',
            'butiran_cenderahati' =>'nullable|string',
            'bayaran_penceramah' => 'nullable|numeric',
            'butiran_penceramah' =>'nullable|string',
            'bayaran_fasilitator' => 'nullable|numeric',
            'butiran_fasilitator' =>'nullable|string',
            'bayaran_penginapan' => 'nullable|numeric',
            'butiran_penginapan' =>'nullable|string',
            'bayaran_tempat' => 'nullable|numeric',
            'butiran_tempat' =>'nullable|string',
            'bayaran_tiket' => 'nullable|numeric',
            'butiran_tiket' =>'nullable|string',
            'bayaran_sijil' =>'nullable|numeric',
            'butiran_sijil' => 'nullable|string',
            'bayaran_tiraiBelakang' =>'nullable|numeric',
            'butiran_tiraiBelakang' => 'nullable|string',

        ];
    }
}

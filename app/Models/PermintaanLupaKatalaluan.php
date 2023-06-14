<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermintaanLupaKatalaluan extends Model
{
    public $table = 'permintaan_lupa_katalaluan';

    protected $guarded = ['id'];

    protected $dates = [
        'updated_at',
        'created_at'
    ];
}

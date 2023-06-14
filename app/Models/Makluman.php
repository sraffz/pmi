<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Makluman extends Model
{
    public $table = 'makluman';

    protected $guarded = ['id'];

    protected $dates = [
        'updated_at'
    ];
}

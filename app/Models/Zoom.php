<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zoom extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'zoom';

    protected $guarded = ['id'];
}

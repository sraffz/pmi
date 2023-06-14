<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Belanjawan extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'belanjawan';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_belanjawan';

    protected $guarded = ['id_belanjawan'];

/**
     * Get the pengguna record associated with the belanjawan.
     */
    public function getPengguna()
    {
        return $this->belongsTo('App\Models\User','id_pentadbir','id_pengguna');
    }

     /**
     * Get the program record associated with the user.
     */
    public function getProgramBelanjawan()
    {
        return $this->hasOne('App\Models\Program','id_program','id_program');
    }
}
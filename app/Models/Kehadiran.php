<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Kehadiran extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
     /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'kehadiran';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_kehadiran';

    protected $fillable = ['created_at']; 

}

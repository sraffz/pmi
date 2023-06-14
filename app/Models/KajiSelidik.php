<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class KajiSelidik extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'kaji_selidik';

    protected $primaryKey = 'id_kaji_selidik';

    protected $guarded = [
        'id_kaji_selidik'
    ];

}

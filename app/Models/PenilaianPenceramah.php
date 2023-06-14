<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class PenilaianPenceramah extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
      /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'penilaian_penceramah';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_penilaian_penceramah';

    protected $guarded = [
        'id_penilaian_penceramah'
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class FailProgram extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
     /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'fail_program';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_fail';

    protected $guarded = ['id_fail'];



}

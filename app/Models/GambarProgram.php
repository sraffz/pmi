<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class GambarProgram extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'gambar_program';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_gambar_program';

    protected $fillable = ['lokasi'];

     /**
     * Get the urusGambar record associated with the user.
     */
    public function urusGambar()
    {
        return $this->hasOne('App\Models\Program','id_program','id_program');
    }

     /**
     * Get the urusGambar record associated with the user.
     */
    public function program()
    {
        return $this->hasOne(Program::class,'id_program','id_program');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Penceramah extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
     /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'penceramah';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_penceramah';


    protected $guarded = ['id_penceramah'];

/**
     * Get the speaker record associated with the user.
     */
    public function senaraiProgram()
    {
        return $this->belongsToMany('App\Models\Program','penceramah_program','id_penceramah','id_program');
    }

    /**
     * Get the speaker record associated with the user.
     */
    public function senaraiPenilaianProgram()
    {
        return $this->belongsToMany('App\Models\Program','penilaian_penceramah','id_penceramah','id_program')->as('penilaian_penceramah')->withPivot('soalan1','soalan2','soalan3')->withTimeStamps();
    }

    public function senaraiPenilaian()
    {
        return $this->hasMany(PenilaianPenceramah::class, 'id_penceramah', 'id_penceramah');
    }

}

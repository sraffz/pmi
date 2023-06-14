<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
class KategoriPengguna extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'kategori_pengguna';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_kategori_pengguna';

    /**
     * Get the kategori record associated with the user.
     */
    public function senaraiPenggunaKategori()
    {
        return $this->hasMany('App\Models\User','kategori','id_kategori_pengguna');
    }
}

<?php

namespace App\Models;

use App\Notifications\PasswordReset;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laratrust\Traits\LaratrustUserTrait;
use OwenIt\Auditing\Contracts\Auditable;

class User extends Authenticatable implements Auditable
{
    use HasApiTokens;
    use Notifiable;
    use SoftDeletes;
    use LaratrustUserTrait;
    use \OwenIt\Auditing\Auditable;

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 10;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'pengguna';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_pengguna';

    /**
     * The model's default values for attributes.
     *
     * @var arrayhasRole
     */
    protected $attributes = [
        'status_aktif' => true,
        'status_katalaluan' => true,
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id_pengguna'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'katalaluan', 'remember_token',
    ];

    /**
     * Casting attribute to carbon object
     *
     * @var array
     */
    protected $dates = [
        "created_at", "updated_at", "deleted_at",
    ];
    
    /**
     * The relations to eager load on every query.
     * 
     */
    protected $with = [];

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->katalaluan;
    }
        
    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordReset($token));
    }

     /**
     * Relation antara User dan Role : many to many -> pivot table = role_user
     */
    public function peranan()
    {
        return $this->belongsToMany(Role::class,'role_user', 'user_id', 'role_id');
    }


    /**
     * Get the kategori record associated with the user.
     */
    // public function getKategori()
    // {
    //     return $this->belongsTo('App\Models\KategoriPengguna','kategori','id_kategori_pengguna');
    // }

    /**
     * Get the pendaftar record associated with the user.
     */
    public function pendaftar()
    {
        return $this->belongsTo('App\Models\User','id_pendaftar','id_pengguna');
    }

    /**
     * Senarai pengguna yang telah didaftarkan oleh pendaftar
     */
    public function senaraiPengguna()
    {
        return $this->hasMany('App\Models\User','id_pendaftar','id_pengguna');
    }

    /**
     * Senarai belanjawan yang telah didaftarkan oleh urusetia
     */
    public function senaraiBelanjawan()
    {
        return $this->hasMany('App\Models\Belanjawan','id_pentadbir','id_pengguna');
    }

       /**
     * The program that belong to the user.
     */
    public function senaraiKajiSelidikProgram()
    {
        return $this->belongsToMany('App\Models\Program','kaji_selidik','id_pengguna','program')->as('kaji_selidik')->withPivot('gred_jawatan','penilaian_keseluruhan','cadangan')->withTimeStamps();
    }

    
    public function senaraiProgramKeseluruhan()
    {
        return $this->belongsToMany(Program::class, 'daftar_program', 'id_pengguna', 'id_program')->as('daftar_program')->withPivot('tarikh_daftar', 'tarikh_batal','status_pengesahan','status_kajiselidik','status_kehadiran','url_sijil')->wherePivot('tarikh_batal', null)->withTimestamps(); 
    }
    
    public function senaraiProgram()
    {
        return $this->belongsToMany(Program::class, 'daftar_program', 'id_pengguna', 'id_program')->as('daftar_program')->withPivot('tarikh_daftar', 'tarikh_batal','status_pengesahan','status_kajiselidik','status_kehadiran','url_sijil')->wherePivot('tarikh_batal', null)->wherePivot('status_pengesahan', 1)->withTimestamps(); 
    }

    public function senaraiProgramDisertai()
    {
        return $this->belongsToMany(Program::class, 'daftar_program', 'id_pengguna', 'id_program')->as('daftar_program')->withPivot('tarikh_daftar', 'tarikh_batal','status_pengesahan','status_kajiselidik','status_kehadiran','url_sijil')->wherePivot('tarikh_batal', null)->wherePivot('status_pengesahan', 1)->withTimestamps(); 
    }
    
    public function senaraiPermohonanProgram()
    {
        return $this->belongsToMany(Program::class, 'daftar_program', 'id_pengguna', 'id_program')->as('daftar_program')->withPivot('tarikh_daftar', 'tarikh_batal','status_pengesahan','status_kajiselidik','status_kehadiran','url_sijil')->wherePivot('tarikh_batal', null)->wherePivot('status_pengesahan', 0)->withTimestamps(); 
    }

    //kehadiran semasa
    public function kehadiranProgram()
    {
        return $this->belongsToMany(Program::class, 'kehadiran', 'id_pengguna', 'id_program');
    }

    //kehadiran penuh
    public function kehadiranPenuhProgram()
    {
        return $this->belongsToMany(Program::class, 'daftar_program', 'id_pengguna', 'id_program')->wherePivot('status_kehadiran', 1)->withTimestamps();
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use SoftDeletes;

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
    public $table = 'program';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_program';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'jumlah_peserta' => 0,
        'status_penyertaan' => 0,
        'status_kehadiran' => 0,
        'status_aktif' => 0,
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id_program'];


    /**
     * Casting attribute to carbon object
     *
     * @var array
     */
    protected $dates = [
        "created_at",
        "updated_at",
        "deleted_at", 
        "tarikh_mula", 
        "tarikh_akhir",
    ];

    protected $casts = [ 
        'tarikh_mula'=>'datetime',
        'tarikh_akhir'=>'datetime',
        "created_at" =>'datetime',
        "updated_at" =>'datetime',
        "deleted_at" =>'datetime', 
    ];
    
    /**
     * The relations to eager load on every query.
     * 
     */
    protected $with = [];

    public static function senarai_program_aktif(){
        return Program::where('status_aktif', 1)->get();
    }

    public static function senarai_semua_program(){
        return Program::with('tempatProgram')->latest()->withTrashed()->get();
    }

    public function toggleStatusAktif()
    {
        $this->status_aktif = !$this->status_aktif;
        return $this;
    }

    public function togglePenyertaan()
    {
        $this->status_penyertaan = !$this->status_penyertaan;
        return $this;
    }

    public function toggleKehadiran()
    {
        $this->status_kehadiran = !$this->status_kehadiran;
        return $this;
    }
    
    public function senaraiKehadiran()
    {
        return $this->belongsToMany(User::class, 'kehadiran', 'id_program', 'id_pengguna')->withTimestamps();
    }
    
    public function kehadiranSemasaProgram()
    {
        return $this->belongsToMany(User::class, 'kehadiran', 'id_program', 'id_pengguna')->wherePivot('created_at', 'LIKE', Carbon::today()->format('Y-m-d').'%')->withTimestamps();
    }

    public function senaraiPeserta()
    {
        return $this->belongsToMany(User::class, 'daftar_program', 'id_program', 'id_pengguna')->as('senarai_peserta')->withPivot('tarikh_daftar', 'tarikh_batal','status_pengesahan','status_kajiselidik','status_kehadiran','url_sijil')->wherePivot('tarikh_batal', null)->wherePivot('status_pengesahan', 1)->withTimestamps(); 
    }

    public function senaraiPesertaHadir()
    {
        return $this->belongsToMany(User::class, 'daftar_program', 'id_program', 'id_pengguna')->as('senarai_peserta')->withPivot('tarikh_daftar', 'tarikh_batal','status_pengesahan','status_kajiselidik','status_kehadiran','url_sijil')->wherePivot('tarikh_batal', null)->wherePivot('status_pengesahan', 1)->wherePivot('status_kehadiran', 1)->withTimestamps(); 
    }

    public function senaraiPesertaTidakHadir()
    {
        return $this->belongsToMany(User::class, 'daftar_program', 'id_program', 'id_pengguna')->as('senarai_peserta')->withPivot('tarikh_daftar', 'tarikh_batal','status_pengesahan','status_kajiselidik','status_kehadiran','url_sijil')->wherePivot('tarikh_batal', null)->wherePivot('status_pengesahan', 1)->wherePivot('status_kehadiran', 0)->withTimestamps(); 
    }

    public function senaraiPermohonanPeserta()
    {
        return $this->belongsToMany(User::class, 'daftar_program', 'id_program', 'id_pengguna')->as('senarai_peserta')->withPivot('tarikh_daftar', 'tarikh_batal','status_pengesahan','status_kajiselidik','status_kehadiran','url_sijil')->wherePivot('tarikh_batal', null)->wherePivot('status_pengesahan', 0)->withTimestamps(); 
    }

    public function senaraiPermohonanPesertaDiterima()
    {
        return $this->belongsToMany(User::class, 'daftar_program', 'id_program', 'id_pengguna')->as('senarai_peserta')->withPivot('tarikh_daftar', 'tarikh_batal','status_pengesahan','status_kajiselidik','status_kehadiran','url_sijil')->wherePivot('tarikh_batal', null)->wherePivot('status_pengesahan', 1)->withTimestamps(); 
    }

    public function senaraiPesertaTelahJawabKajiSelidik()
    {
        return $this->belongsToMany(User::class, 'daftar_program', 'id_program', 'id_pengguna')->as('senarai_peserta')->withPivot('tarikh_daftar', 'tarikh_batal','status_pengesahan','status_kajiselidik','status_kehadiran','url_sijil')->wherePivot('tarikh_batal', null)->wherePivot('status_pengesahan', 1)->wherePivot('status_kajiselidik', 1)->withTimestamps(); 
    }

    public function senaraiPesertaBelumJawabKajiSelidik()
    {
        return $this->belongsToMany(User::class, 'daftar_program', 'id_program', 'id_pengguna')->as('senarai_peserta')->withPivot('tarikh_daftar', 'tarikh_batal','status_pengesahan','status_kajiselidik','status_kehadiran','url_sijil')->wherePivot('tarikh_batal', null)->wherePivot('status_pengesahan', 1)->wherePivot('status_kajiselidik', 0)->withTimestamps(); 
    }

    public function senaraiPesertaKeseluruhan()
    {
        return $this->belongsToMany(User::class, 'daftar_program', 'id_program', 'id_pengguna')->as('senarai_peserta')->withPivot('tarikh_daftar', 'tarikh_batal','status_pengesahan','status_kajiselidik','status_kehadiran','url_sijil')->wherePivot('tarikh_batal', null)->withTimestamps(); 
    }

    public function pesertaBatal()
    {
        return $this->belongsToMany(User::class, 'daftar_program', 'id_program', 'id_pengguna')->as('senarai_peserta')->withPivot('tarikh_daftar', 'tarikh_batal','status_pengesahan','status_kajiselidik','status_kehadiran','url_sijil')->wherePivot('tarikh_batal', '<>', null)->withTimestamps();
    }
  
    public function senaraiPenceramah()
    {
        return $this->belongsToMany('App\Models\Penceramah', 'penceramah_program', 'id_program', 'id_penceramah');

    }

    public function senaraiKajiSelidikPengguna()
    {
        return $this->belongsToMany(User::class,'kaji_selidik','program','id_pengguna')->as('kaji_selidik')->withPivot('gred_jawatan','penilaian_keseluruhan','penilaian_kemudahan','penilaian_bahan','penambahbaikan','cadangan')->withTimeStamps();
        
    }

    public function senaraiPenilaianPenceramah()
    {
        return $this->belongsToMany(Penceramah::class,'penilaian_penceramah','id_program','id_penceramah')->as('penilaian_penceramah')->withPivot('soalan1','soalan2','soalan3')->withTimeStamps();
    }

    public function tempatProgram()
    {
        return $this->belongsTo(TempatProgram::class, 'tempat', 'id');
    }

    public function belanjawan()
    {
        return $this->hasOne('App\Models\Belanjawan', 'id_program', 'id_program');
    }

    public function senaraiGambar()
    {
        return $this->hasMany(GambarProgram::class, 'id_program', 'id_program');
    }

    public function slaid()
    {
        return $this->hasMany(FailProgram::class, 'id_program', 'id_program')->where('nama_fail', 'Slaid');
    }

    public function aturcara()
    {
        return $this->hasMany(FailProgram::class, 'id_program', 'id_program')->where('nama_fail', 'Aturcara');
    }

    public function kajiselidik()
    {
        return $this->hasMany(KajiSelidik::class, 'program', 'id_program');
    }

    public function urusetia()
    {
        return $this->hasOne(User::class, 'id_pengguna', 'pengurus_program');
    }

    public function zoom()
    {
        return $this->hasOne(Zoom::class, 'id_program', 'id_program');
    }

    
}

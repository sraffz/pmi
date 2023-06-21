<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PenggunaRequest;
use App\Models\KajiSelidik;
use App\Models\PenilaianPenceramah;
use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\DaftarProgram;
use App\Models\KategoriPengguna;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $senaraiPengguna = User::all()->except([1]);
        // dd($senaraiPengguna);
        $data = [
            'senaraiPengguna' => $senaraiPengguna,];

        return view ('pengguna.index',$data);

    }

    

    public function delete($id)
        {
            $pengguna = User::findOrFail($id);
            $pengguna = $pengguna->delete();
    
    
            return redirect()->route('senarai.pengguna');
    
        }
 
                    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $senaraiKategoriPengguna = KategoriPengguna::all();
        return view('pengguna.create', compact('senaraiKategoriPengguna'));
    }

    public function maklumatPengguna($id)
    {
    
        $maklumatPengguna = User::find($id);
        
        $data = [
            'pengguna' => $maklumatPengguna,];
    
        return view ('pengguna.maklumat-pengguna',$data);
    
    }

    public function update(PenggunaRequest $request, $id)
    {
        // dd($request->all());
        $pengguna = User::find($id);
        $pengguna->update($request->all());

        $pengguna->syncRoles([]);
        $pengguna->attachRoles($request->tahap);

        Alert::success('Rekod Berjaya Disimpan');

        return redirect()->route('senarai.pengguna');
    }

    public function edit($id)
    {
        $pengguna = User::find($id);
        $senaraiKategoriPengguna = KategoriPengguna::all();

        $data= [
            'pengguna'=> $pengguna,
            'senaraiKategoriPengguna'=> $senaraiKategoriPengguna,
            
        ];
        return view('pengguna.edit',$data);
    }



public function store(PenggunaRequest $request)
{
    // dd($request->all());
    $password = bcrypt($request->katalalauan);
    $pengguna = User::create($request->except(['katalaluan','katalaluan-confirmation','tahap'])+['katalaluan' => $password]);
    $pengguna->attachRoles($request->tahap);

    Alert::success('Maklumat pengguna berjaya disimpan');

    return redirect()->route('senarai.pengguna');
}

    
    public function senaraiPermohonanProgram()
    {
        $pengguna = User::find(Auth::user()->id_pengguna);
        
        $data = array(
            'senaraiProgram' => $pengguna->senaraiProgramKeseluruhan()->with('tempatProgram')->where('status_aktif', 1)->get(),
        );

        return view('program.senarai-permohonan-individu', $data);
    }
    
    public function senaraiPenyertaanProgram()
    {
        $pengguna = User::find(Auth::user()->id_pengguna);
        
        $data = array(
            'senaraiProgram' => $pengguna->senaraiProgramDisertai()->with('tempatProgram')->get(),
        );

        return view('program.senarai-penyertaan-individu', $data);
    }

    public function daftarPesertaProgram($id)
    {
        $pengguna = User::find(Auth::user()->id_pengguna);
        $program = Program::find($id);

        if ($program->status_penyertaan == 0) {
            Alert::error('Permohonan penyertaan telah ditutup.');
            return redirect()->back();
        }

        if (!$program->senaraiPermohonanPeserta()->find($pengguna->id_pengguna)) 
        {
            $status_pengesahan = (checkTarikhProgram($program)) ? 1 : 0;
            if(checkTarikhProgram($program))
            {
                $status_pengesahan =  1;
                $program->increment('jumlah_peserta');
            }
            else
            {
                $status_pengesahan =  0;
            }

            $program->pesertaBatal()->detach($pengguna);
            $pengguna->senaraiProgramKeseluruhan()->attach($program->id_program, ['tarikh_daftar' => Carbon::now(), 'status_pengesahan' => $status_pengesahan]);
            Alert::success('Permohonan diterima.');
        }
        else 
        {
            Alert::error('Permohonan telah dibuat, hanya satu permohonan dibenarkan.');
        }

        
        return redirect()->back();
    }

    public function batalPenyertaanProgram($id)
    {
        $pengguna = User::find(Auth::user()->id_pengguna);
        $program = Program::find($id);

        if ($pengguna->senaraiProgramKeseluruhan()->find($program->id_program)) 
        {
            $pengguna->senaraiProgramKeseluruhan()->updateExistingPivot($program->id_program, ['tarikh_batal' => Carbon::now()]);
            $program->decrement('jumlah_peserta');
            Alert::success('Permohonan telah dibatalkan.');
        }
        
        return redirect()->back();
    }

    public function createKajiSelidik($idProgram)
    {
        $program = Program::find($idProgram);

        $data = [
            'program' => $program,
        ];

        return view('kaji-selidik.create', $data);
    }

    public function storeKajiSelidik($idProgram, Request $request)
    {
        $program = Program::find($idProgram);
        $pengguna = Auth::user();

        $kehadiran = DaftarProgram::where('id_program', $idProgram)->where('id_pengguna', $pengguna->id_pengguna)->first()->status_kehadiran;
        if(!$kehadiran)
        {
            Alert::error('Hanya peserta yang hadir program boleh menjawab soal selidik.');
            return redirect()->back()->withInput();
        }

        $validator = Validator::make($request->all(), [
            'penilaian_keseluruhan' => 'required',
            'penilaian_kemudahan' => 'required',
            'penilaian_bahan' => 'required',
            'penambahbaikan' => 'required',
            'cadangan' => 'required',
            'soalan1.*' => 'required',
            'soalan2.*' => 'required',
            'soalan3.*' => 'required',
        ]);


        if ($validator->fails()) {
            Alert::error('Sila lengkapkan kaji selidik sebelum hantar');

            return redirect()->back()->withInput();
        }
        
        
        

        $nokadpengenalan = $pengguna->no_kad_pengenalan;
        
        $tmp_hari = substr($nokadpengenalan,4,2);
        $tmp_bulan = substr($nokadpengenalan,2,2);
        $tmp_tahun = substr($nokadpengenalan,0,2);
        $tmp_jantina = substr($nokadpengenalan,11,1);

        //UMUR
        $tmp_tarikh_lahir = $tmp_tahun."-".$tmp_bulan."-".$tmp_hari;
        $umur = date_create($tmp_tarikh_lahir)->diff(date_create('today'))->y;

        //JANTINA
        if($tmp_jantina % 2 == 0) {
            $jantina = 'Perempuan';
        }
        else {
            $jantina = 'Lelaki';
        }

        

        foreach ($request->idPenceramah as $key => $id) {
            PenilaianPenceramah::create([
                'id_penceramah' => $id,
                'id_program' => $idProgram,
                'id_peserta' => $pengguna->id_pengguna,
                'soalan1' => $request->soalan1[$key],
                'soalan2' => $request->soalan2[$key],
                'soalan3' => $request->soalan3[$key],
            ]);
        }

        KajiSelidik::create([
            'id_pengguna' => $pengguna->id_pengguna,
            'program' => $idProgram,
            'peringkat' => '',
            'gred_jawatan' => '',
            'penilaian_keseluruhan' => $request->penilaian_keseluruhan,
            'penilaian_kemudahan' => $request->penilaian_kemudahan,
            'penilaian_bahan' => $request->penilaian_bahan,
            'penambahbaikan' => $request->penambahbaikan,
            'cadangan' => $request->cadangan,
        ]);

        $uuid = Uuid::uuid5('6ba7b811-9dad-11d1-80b4-00c04fd430c8',$program->qrcode_kehadiran.$pengguna->no_kad_pengenalan);
        $program->senaraiPeserta()->updateExistingPivot($pengguna->id_pengguna, ['status_kajiselidik' => 1, 'url_sijil' => $uuid]);

        Alert::success('Terima Kasih kerana menjawab kaji selidik.');

        return redirect()->route('senarai.penyertaan.individu');
        
    }


public function profile()
{

   $profile = Auth::user();
   $senaraiKategoriPengguna = KategoriPengguna::all();

   $skim = DB::table('skim')->get();
   $jabatan = DB::table('jabatan')->get();
   $gred_angka = DB::table('gred_angka')->get();
   $gred_kod = DB::table('gred_kod')->get();

    $data = [
        'profile' => $profile,
        'skim' => $skim,
        'jabatan' => $jabatan,
        'gred_angka' => $gred_angka,
        'gred_kod' => $gred_kod,
    ];


    return view ('profile.index',$data);

}



public function editProfile($id)
{
    $profile = Auth::user();


    $data= [
        'profile'=> $profile,
        
    ];
    return view ('profile.edit',$data);
}


public function resetPassword()
{

  $resetKataLaluan = User::find(auth()->user()->id_pengguna);
  
    $data = [
        'resetKataLaluan' => $resetKataLaluan,];


    return view ('reset_password.index',$data);

}



public function updateProfile(Request $request)
{
    $pengguna = Auth()->user();

    $validate = Validator::make($request->all(),[
        'email' => "required|unique:pengguna,email,$pengguna->id_pengguna,id_pengguna",
    ])->validate();

    $profile = $pengguna->update($request->all());
            
    if($profile)
    {
        Alert::success('Berjaya dikemaskini');
        }
    else
    {
        Alert::error('Tidak Berjaya dikemaskini');
    }

        return redirect()->back();
}

public function tukarKatalaluan(Request $request)
{
    $pengguna  = Auth::user();

    $hashCurrent = $pengguna->katalaluan;

    if(Hash::check($request->katalaluan_semasa, $hashCurrent))
    {
        $pattern = '/'.'(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&].{11,}'.'/';
        $validator = Validator::make($request->all(),[
            'katalaluan' => "required|confirmed|regex:$pattern",
        ],[
            'katalaluan.regex' => 'Katalaluan mesti mempunyai sekurangnya 12 aksara, 1 nombor, 1 huruf besar dan kecil serta 1 simbol'
        ])->validate();

        Alert::success('Katalaluan Baru Berjaya Disimpan');

        return redirect()->back();
    }
    else
    {
        Alert::error('Katalaluan Semasa Salah');

        return redirect()->back();
    }
    
}




}


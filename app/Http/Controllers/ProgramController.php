<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Penceramah;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\ProgramRequest;
use App\Models\TempatProgram;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\DaftarProgram;
use App\Models\JenisProgram;
use App\Models\Kehadiran;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Log;
use PDF;
use Ramsey\Uuid\Uuid;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Notification;
use App\Notifications\EmailPengesahanTerimaPermohonan;

class ProgramController extends Controller
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
        $program = Program::with('tempatProgram', 'urusetia')->latest()->get();


        $data = array(
            'senaraiProgram' => $program,

        );

        return view('program.index', $data);
    }

    public function create()
    {
        $senaraiJenis = JenisProgram::all();
        $senaraiTempat = TempatProgram::all();
        $senaraiPenceramah = Penceramah::all();
        $senaraiUrusetia = User::whereRoleIs('urusetia')->get();
        // dd($senaraiTempat);
        $data = [
            'senaraiJenis' => $senaraiJenis,
            'senaraiTempat' => $senaraiTempat,
            'senaraiPenceramah' => $senaraiPenceramah,
            'senaraiUrusetia' => $senaraiUrusetia,
        ];

        return view('program.create', $data);
    }

    public function show($id)
    {
        $program = Program::find($id);

        $data = [
            'program' => $program,
        ];

        return view('program.show', $data);
    }

    public function store(ProgramRequest $request)
    {

        if ($request->hasFile('poster_program')) {
            $path = Storage::disk('lampiran')->putFile('poster_program', $request->file('poster_program'));
        } else {
            $path = '';
        }

        $uuid = Uuid::uuid4();
        $id_pendaftar = Auth::user()->id_pengguna;

        $program = Program::create($request->except('penceramah', 'poster_program') + ['poster_program' => $path, 'qrcode_kehadiran' => $uuid, 'id_pendaftar' => $id_pendaftar]);

        $program->belanjawan()->create(['id_pentadbir' => Auth::user()->id_pengguna]);

        //jika tempat secara maya create maklumat zoom meeting
        if ($request->tempat == 7) {
            $program->zoom()->create();
        }

        $program->senaraiPenceramah()->sync($request->penceramah);

        $tempat = TempatProgram::find($request->tempat);
        $program->tempatProgram()->associate($tempat)->save();

        if ($program) {
            Alert::success('Rekod Berjaya Disimpan');
        } else {
            Alert::error('Rekod Tidak Berjaya Disimpan');
        }
        return redirect()->route('program.index');
    }

    public function edit($id)
    {
        $program = Program::find($id);
        $senaraiJenis = JenisProgram::all();
        $senaraiTempat = TempatProgram::all();
        $senaraiPenceramah = Penceramah::all();
        $senaraiUrusetia = User::whereRoleIs('urusetia')->get();

        $data = [
            'program' => $program,
            'senaraiJenis' => $senaraiJenis,
            'senaraiTempat' => $senaraiTempat,
            'senaraiPenceramah' => $senaraiPenceramah,
            'senaraiUrusetia' => $senaraiUrusetia,
        ];

        return view('program.edit', $data);
    }


    public function update(ProgramRequest $request, $id)
    {
        $program = Program::find($id);

        if ($request->hasFile('poster_program')) {
            $path = Storage::disk('lampiran')->putFile('poster_program', $request->file('poster_program'));
            $program->update(['poster_program' => $path]);
        }

        $program->update($request->except('penceramah', 'poster_program'));

        $program->senaraiPenceramah()->sync($request->penceramah);

        $tempat = TempatProgram::find($request->tempat);
        $program->tempatProgram()->associate($tempat)->save();

        if ($program) {
            Alert::success('Berjaya Dikemaskini');
        } else {
            Alert::error('Tidak Berjaya Dikemaskini');
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        $program = Program::withTrashed()->findOrFail($id);

        ($program->status_aktif == 0) ? $program->forceDelete() :  Alert::error("Program perlu ditutup sebelum hapus.");


        return redirect()->back();
    }


    public function senaraiProgramAktif()
    {

        $data = array(
            'senaraiProgramAktifChunk' => Program::senarai_program_aktif()->chunk(2),
        );
        // dd(Program::senarai_program_aktif()->chunk(2)->toArray());
        return view('program.senarai_program_aktif', $data);
    }

    public function pengurusanProgram()
    {
        $data = array(
            'senarai_program' => Program::senarai_semua_program(),
        );

        return view('program.pengurusan_program', $data);
    }

    public function toggleStatusAktif($id)
    {
        $program = Program::findOrFail($id);
        $program->update(['status_penyertaan' => 0, 'status_kehadiran' => 0]);
        $program->toggleStatusAktif()->save();

        return redirect()->back();
    }

    public function toggleStatusPenyertaan($id)
    {
        $program = Program::findOrFail($id);

        ($program->status_aktif == 1) ? $program->togglePenyertaan()->save() : Alert::error("Program tidak dibuka.");

        return redirect()->back();
    }

    public function toggleStatusKehadiran($id)
    {
        $program = Program::findOrFail($id);

        ($program->status_aktif == 1) ? $program->toggleKehadiran()->save() :  Alert::error("Program tidak dibuka.");

        return redirect()->back();
    }

    public function toggleArkib($id)
    {
        $program = Program::withTrashed()->findOrFail($id);

        if ($program->trashed()) {
            $program->restore();
        } else {
            ($program->status_aktif == 0) ? $program->delete() :   Alert::error("Program perlu ditutup sebelum arkib.");
        }

        return redirect()->back();
    }

    public function belanjawan($id)
    {
        $program = Program::find($id);


        $data = [
            'program' => $program,

        ];
        return view('belanjawan.show', $data);
    }



    public function pesertaProgram()
    {

        $senaraiProgram = Program::with('tempatProgram')->latest()->get();;


        $data = [
            'senaraiProgram' => $senaraiProgram,

        ];
        return view('program.peserta-program', $data);
    }

    public function senaraiPeserta($id)
    {

        $program = Program::find($id);
        $senaraiPengguna = User::whereRoleIs('individu')->get();

        $data = [
            'program' => $program,
            'senaraiPengguna' => $senaraiPengguna,
        ];

        return view('program.senarai-peserta', $data);
    }

    public function cetakSenaraiPeserta($id)
    {
        $program = Program::find($id);
        $senaraiPengguna = User::whereRoleIs('individu')->get();

        $data = [
            'program' => $program,
            'senaraiPengguna' => $senaraiPengguna,
        ];

        // return view('program.cetak.senarai-peserta', $data);

        $pdf = PDF::loadView('program.cetak.senarai-peserta', $data);
        return $pdf->stream('Senarai Peserta '.$program->nama_program.'.pdf');
    }

    public function updateSenaraiPeserta(Request $request, $id)
    {
        $program = Program::find($id);

        if (!$program->status_aktif) {
            Alert::error('Program telah ditutup');
            return redirect()->back();
        }

        if ($request->senaraiPeserta) {
            foreach ($request->senaraiPeserta as $idPeserta) {
                if ($program->jumlah_peserta >= $program->kuota_peserta) {
                    Alert::error('Kuota peserta program telah penuh');
                    return redirect()->back();
                } else if (!$program->senaraiPeserta()->where('pengguna.id_pengguna', $idPeserta)->exists()) {
                    $program->pesertaBatal()->detach($idPeserta);
                    $program->senaraiPeserta()->attach($idPeserta, ['tarikh_daftar' => Carbon::now(), 'status_pengesahan' => 1]);
                    $program->increment('jumlah_peserta');
                    Alert::success('Peserta berjaya ditambah');
                } else if ($program->senaraiPeserta()->where('pengguna.id_pengguna', $idPeserta)->exists()) {
                    Alert::success('Peserta telah wujud');
                }
            }
        }


        return redirect()->back();
    }


    public function senaraiPermohonanPeserta($id)
    {

        $program = Program::find($id);

        $data = [
            'program' => $program,
        ];

        return view('program.senarai-permohonan-peserta', $data);
    }

    public function pengesahanPermohonanPeserta($idProgram, $idPengguna)
    {
        $program = Program::find($idProgram);
        $pengguna = User::where('id_pengguna', $idPengguna)->first();
        // dd($pengguna->email);
        Notification::send($pengguna, new EmailPengesahanTerimaPermohonan($program));
        // dd($program);

        if ($program->kuota_peserta == $program->jumlah_peserta) {
            Alert::error('Kuota peserta program telah penuh');
            return redirect()->back();
        }

        $program->senaraiPermohonanPeserta()->updateExistingPivot($idPengguna, ['status_pengesahan' => 1]);
        $program->increment('jumlah_peserta');

        #generate surat tawaran


        Alert::success('Permohonan diterima');

        return redirect()->back();
    }

    public function deletePeserta($id_program, $id_peserta)
    {
        $program = Program::find($id_program);

        if (!$program->status_aktif) {
            Alert::error('Program telah ditutup');
            return redirect()->back();
        }

        $program->senaraiPeserta()->updateExistingPivot($id_peserta, ['tarikh_batal' => Carbon::now()]);
        $program->decrement('jumlah_peserta');
        Alert::success('Penyertaan peserta dibatalkan');

        return redirect()->back();
    }


    public function slide($id)
    {
        $program = Program::find($id);

        $data = [
            'program' => $program
        ];

        return view('program.slide', $data);
    }

    public function kemaskiniSlaid($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'slaid' => 'required|file|max:10485760|mimes:pdf',
        ])->validate();

        $program = Program::find($id);

        $folder = str_slug($program->nama_program, '-');

        if ($request->hasFile('slaid')) {
            if ($program->slaid()->exists()) {
                Storage::disk('lampiran')->delete($program->slaid()->first()->lokasi);
                $program->slaid()->delete();
            }
            $program->slaid()->create([
                'nama_fail' => 'Slaid',
                'jenis_fail' => 'pdf',
                'lokasi' => Storage::disk('lampiran')->putFile($folder, $request->file('slaid'))
            ]);
        }

        Alert::success('Slaid telah dikemaskini');

        return redirect()->back();
    }

    public function hapusSlaid($id)
    {
        $program = Program::find($id);

        if ($program->slaid()->exists()) {
            Storage::disk('lampiran')->delete($program->slaid()->first()->lokasi);
            $program->slaid()->delete();
        }

        Alert::success('Slaid telah dihapus');

        return redirect()->back();
    }


    public function aturcara($id)
    {
        $program = Program::find($id);

        $data = [
            'program' => $program
        ];

        return view('program.aturcara', $data);
    }

    public function kemaskiniAturcara($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'aturcara' => 'required|file|max:10485760|mimes:pdf',
        ])->validate();

        $program = Program::find($id);

        $folder = str_slug($program->nama_program, '-');

        if ($request->hasFile('aturcara')) {
            if ($program->aturcara()->exists()) {
                Storage::disk('lampiran')->delete($program->aturcara()->first()->lokasi);
                $program->aturcara()->delete();
            }
            $program->aturcara()->create([
                'nama_fail' => 'Aturcara',
                'jenis_fail' => 'pdf',
                'lokasi' => Storage::disk('lampiran')->putFile($folder, $request->file('aturcara'))
            ]);
        }

        Alert::success('Lampiran aturcara telah dikemaskini');

        return redirect()->back();
    }

    public function hapusAturcara($id)
    {
        $program = Program::find($id);

        if ($program->aturcara()->exists()) {
            Storage::disk('lampiran')->delete($program->aturcara()->first()->lokasi);
            $program->aturcara()->delete();
        }

        Alert::success('Aturcara telah dihapus');

        return redirect()->back();
    }

    public function dokumen()
    {
        $data = array(
            'senarai_program' => Program::all()
        );

        return view('program.dokumen', $data);
    }

    public function showPenceramahProgram($id)
    {
        $program = Program::find($id);
        $senaraiPenceramah = Penceramah::all()->pluck('nama_penceramah', 'id_penceramah')->toArray();

        $data = [
            'program' => $program,
            'senaraiPenceramah' => $senaraiPenceramah,
        ];

        return view('program.penceramah-program', $data);
    }

    public function updatePenceramahProgram(Request $request, $id)
    {
        $program = Program::find($id);

        $program->senaraiPenceramah()->sync($request->penceramah);

        return redirect()->back();
    }

    public function kehadiran($id)
    {
        $program = Program::find($id);

        $data = [
            'program' => $program,
        ];

        return view('program.kehadiran', $data);
    }

    public function kemaskiniKehadiran(Request $request, $id)
    {
        $program = Program::find($id);
        $tarikhKehadiran = Carbon::parse($request->tarikh_kehadiran);
        $period = CarbonPeriod::since($program->tarikh_mula)->days(1)->until($program->tarikh_akhir);

        if (!Auth::user()->hasRole(['urusetia', 'superadmin'])) {
            if (!$program->status_kehadiran) {
                Alert::error('Pendaftaran kehadiran tidak dibuka.');

                return redirect()->back();
            }
        }


        if ($request->senaraiPeserta) {
            foreach ($request->senaraiPeserta as $idPeserta) {
                if (!Kehadiran::where('id_program', $program->id_program)->where('id_pengguna', $idPeserta)->where('created_at', 'LIKE', $tarikhKehadiran->format('Y-m-d') . '%')->exists()) {
                    $program->senaraiKehadiran()->attach($idPeserta, ['created_at' => $tarikhKehadiran]);
                    Alert::success('Pendaftaran kehadiran diterima.');
                }

                $kehadiran = collect([]);
                foreach ($period as $date) {
                    $flag = Kehadiran::where('id_program', $program->id_program)->where('id_pengguna', $idPeserta)->where('created_at', 'LIKE', $date->format('Y-m-d') . '%')->exists();
                    $kehadiran->push($flag);
                }

                if ($kehadiran->contains(true) && !$kehadiran->contains(false)) {
                    $kehadiranPenuh = 1; //Hadir
                }

                if ($kehadiran->contains(true) && $kehadiran->contains(false)) {
                    $kehadiranPenuh = 2; // Hadir Sebahagian
                }

                $program->senaraiPeserta()->updateExistingPivot($idPeserta, ['status_kehadiran' => $kehadiranPenuh]);
            }
        }

        return redirect()->back();
    }

    public function batalKehadiran($idProgram, $idPeserta, $tarikh)
    {
        $program = Program::find($idProgram);
        $tarikhBatal = Carbon::parse($tarikh);
        $period = CarbonPeriod::since($program->tarikh_mula)->days(1)->until($program->tarikh_akhir);

        if (!$program->status_aktif) {
            Alert::error('Program telah ditutup.');

            return redirect()->back();
        }

        $tarikhHadir = Kehadiran::where('id_program', $idProgram)->where('id_pengguna', $idPeserta)->where('created_at', 'LIKE', $tarikhBatal->format('Y-m-d') . '%');
        if ($tarikhHadir->delete()) {
            $kehadiran = collect([]);
            foreach ($period as $date) {
                $flag = Kehadiran::where('id_program', $program->id_program)->where('id_pengguna', $idPeserta)->where('created_at', 'LIKE', $date->format('Y-m-d') . '%')->exists();
                $kehadiran->push($flag);
            }

            if ($kehadiran->contains(false) && !$kehadiran->contains(true)) {
                $kehadiranPenuh = 0; //Tidak Hadir
            }

            if ($kehadiran->contains(true) && $kehadiran->contains(false)) {
                $kehadiranPenuh = 2; // Hadir Sebahagian
            }

            $program->senaraiPeserta()->updateExistingPivot($idPeserta, ['status_kehadiran' => $kehadiranPenuh]);

            Alert::success('Pendaftaran kehadiran dibatalkan.');
        }




        return redirect()->back();
    }

    public function sijil($url_sijil)
    {
        $ada = DaftarProgram::where('url_sijil', $url_sijil)->get();
        if ($ada->isEmpty()) {
            Log::warning("Cubaan akses url sijil tanpa sah");
            return abort(404);
        }

        $kajiselidik = DaftarProgram::where('url_sijil', $url_sijil)->first()->status_kajiselidik;
        if (!$kajiselidik) {
            Alert::error('Sila jawab kaji selidik dahulu untuk dapatkan sijil');

            return redirect()->back();
        }

        $idProgram = DaftarProgram::where('url_sijil', $url_sijil)->first()->id_program;
        $idPeserta = DaftarProgram::where('url_sijil', $url_sijil)->first()->id_pengguna;

        $program = Program::find($idProgram);
        $peserta = User::find($idPeserta);

        $qrcode = QrCode::size(100)->generate(route('pengesahan.sijil', ['url_sijil' => $url_sijil]));

        $qrcode = str_replace('<?xml version="1.0" encoding="UTF-8"?>', '', $qrcode);

        $data = [
            'program' => $program,
            'peserta' => $peserta,
            'qrcode' => $qrcode,
        ];

        $pdf = PDF::loadView('sijil.template', $data);

        return $pdf->stream('Sijil.pdf');
        // return view('sijil.template', $data);
    }

    public function janaQRCodeKehadiran($id)
    {
        $program = Program::find($id);

        $qrcode = QrCode::size(1000)->generate(route('program.pengesahan-kehadiran', ['uuid' => $program->qrcode_kehadiran]));

        $qrcode = str_replace('<?xml version="1.0" encoding="UTF-8"?>', '', $qrcode);

        $data = [
            'program' => $program,
            'qrcode' => $qrcode,
        ];

        $pdf = PDF::loadView('kehadiran.qrcode', $data);

        return $pdf->stream('Kod_QR.pdf');
    }
}

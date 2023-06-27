<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\HijriCarbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
// use DB;

Route::get('kelgov-ppst', function () {
    return redirect('https://play.google.com/store/apps/details?id=my.gov.kelantan.kelgovppst');
});

Route::get('/clear-cache', function () {
	Artisan::call('cache:clear');
	Artisan::call('view:clear');
	Artisan::call('config:clear');

	return "All is cleared";
});

Route::get('update-role', function () {
    DB::table('audits')->update([
        'user_type' => 'App\Models\User',
        'aduditable_type' => 'App\Models'
    ]);

    // update `audits` set `auditable_type`= replace (`auditable_type`, 'App','App\\Models') where `auditable_type`like 'App%'


    return ('done');
});


Auth::routes();

Route::post('app/login', [App\Http\Controllers\Apps\LoginController::class, 'login']);
Route::get('app/logout', [App\Http\Controllers\Apps\LoginController::class, 'logout'])->middleware('auth:api');
Route::post('app/register', [App\Http\Controllers\Apps\RegisterController::class, 'register']);
Route::post('app/forgot-password', [App\Http\Controllers\Apps\LoginController::class, 'forgotPassword']);
Route::get('app/senarai-program', [App\Http\Controllers\Apps\ProgramController::class, 'senaraiProgram'])->middleware('auth:api');
Route::post('app/daftar-penyertaan-program', [App\Http\Controllers\Apps\ProgramController::class, 'daftarPenyertaanProgram'])->middleware('auth:api');
Route::post('app/batal-penyertaan-program', [App\Http\Controllers\Apps\ProgramController::class, 'batalPenyertaanProgram'])->middleware('auth:api');

Route::GET('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::GET('/halaman-utama', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::GET('/katalog', [App\Http\Controllers\WelcomeController::class, 'katalog'])->name('katalog');
Route::GET('/takwim', [App\Http\Controllers\WelcomeController::class, 'takwim'])->name('takwim');

Route::POST('/carian-kursus', [App\Http\Controllers\WelcomeController::class, 'carianKursus'])->name('carian.kursus');
Route::POST('/butiran-kursus', [App\Http\Controllers\WelcomeController::class, 'butiranKursus'])->name('butiran.kursus');
 
Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});

Route::GET('/debug-cal', function () {
    echo HijriCarbon::now()->hijriFormat('l ، j F ، Y');
});

Route::GET('/debug-youtube', [App\Http\Controllers\YoutubeController::class, 'accessToken']);

Route::middleware(['auth'])->group(function () {

    //Laravel Log
    Route::GET('ppst-logs',  '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
});


//Dasar Keselamatan dan Privasi
Route::GET('/dasar-keselamatan-dan-privasi', function () {
    return view('privacy');
})->name('privasi');

//Youtube
Route::GET('program/youtube/play', [App\Http\Controllers\YoutubeController::class, 'view']);
Route::GET('program/youtube/upload', [App\Http\Controllers\YoutubeController::class, 'edit'])->name('program.youtube.edit');
Route::POST('program/youtube/upload', [App\Http\Controllers\YoutubeController::class, 'update'])->name('program.youtube.update');

//Zoom
Route::GET('program/kemaskini-zoom/{id}', [App\Http\Controllers\ZoomController::class, 'edit'])->name('program.kemaskini-zoom');
Route::GET('program/zoom-meeting/{id}', [App\Http\Controllers\ZoomController::class, 'joinZoom'])->name('program.join-zoom');
Route::POST('program/update-zoom/{zoom}', [App\Http\Controllers\ZoomController::class, 'update'])->name('program.update-zoom');

//Audit
Route::GET('audits', [App\Http\Controllers\AuditController::class, 'index'])->name('audit.index');

//Belanjawan
Route::GET('senarai-belanjawan', [App\Http\Controllers\BelanjawanController::class, 'index'])->name('belanjawan.index');
Route::GET('/belanjawan/{id}/kemaskini', [App\Http\Controllers\BelanjawanController::class, 'edit'])->name('belanjawan.edit');
Route::PUT('belanjawan/{id}/kemaskini', [App\Http\Controllers\BelanjawanController::class, 'update'])->name('belanjawan.update');

//Penceramah
Route::GET('senarai-penceramah', [App\Http\Controllers\PenceramahController::class, 'index'])->name('penceramah.index');
Route::GET('penceramah/{id}/hapus', [App\Http\Controllers\PenceramahController::class, 'destroy'])->name('penceramah.destroy');
Route::GET('penceramah/tambah', [App\Http\Controllers\PenceramahController::class, 'create'])->name('penceramah.create');
Route::GET('penceramah/{id}/kemaskini', [App\Http\Controllers\PenceramahController::class, 'edit'])->name('penceramah.edit'); //13/5
Route::POST('penceramah/simpan', [App\Http\Controllers\PenceramahController::class, 'store'])->name('penceramah.store'); //13/5
Route::PUT('penceramah/{id}/kemaskini', [App\Http\Controllers\PenceramahController::class, 'update'])->name('penceramah.update'); //13/5

//Program
Route::GET('pengurusan-program', [App\Http\Controllers\ProgramController::class, 'index'])->name('program.index');
Route::GET('program/tambah', [App\Http\Controllers\ProgramController::class, 'create'])->name('program.create');
Route::GET('program/{id}/kemaskini', [App\Http\Controllers\ProgramController::class, 'edit'])->name('program.edit');
Route::GET('program/{id}/hapus', [App\Http\Controllers\ProgramController::class, 'destroy'])->name('program.destroy');
Route::GET('program/{id}/maklumat', [App\Http\Controllers\ProgramController::class, 'show'])->name('program.show');
Route::POST('program/simpan', [App\Http\Controllers\ProgramController::class, 'store'])->name('program.store');
Route::PUT('program/{id}/kemaskini', [App\Http\Controllers\ProgramController::class, 'update'])->name('program.update');
Route::GET('share-program/{uuid}', [App\Http\Controllers\PublicController::class, 'shareProgram'])->name('program.share');

//Belanjawan Program
Route::GET('/program/{id}/belanjawan', [App\Http\Controllers\ProgramController::class, 'belanjawan'])->name('program.belanjawan');

//Pengurusan Program
Route::GET('program/senarai-program-dibuka', [App\Http\Controllers\ProgramController::class, 'senaraiProgramAktif'])->name('senarai.program.aktif');
Route::GET('program/status-program', [App\Http\Controllers\ProgramController::class, 'pengurusanProgram'])->name('pengurusan_program');
Route::GET('program/{id}/toggle-aktif', [App\Http\Controllers\ProgramController::class, 'toggleStatusAktif'])->name('toggle_program');
Route::GET('program/{id}/toggle-penyertaan', [App\Http\Controllers\ProgramController::class, 'toggleStatusPenyertaan'])->name('toggle_penyertaan');
Route::GET('program/{id}/toggle-kehadiran', [App\Http\Controllers\ProgramController::class, 'toggleStatusKehadiran'])->name('toggle_kehadiran');
Route::GET('program/{id}/toggle-arkib', [App\Http\Controllers\ProgramController::class, 'toggleArkib'])->name('toggle_arkib');

//Penceramah Program
Route::GET('senarai-penceramah-program/{id}', [App\Http\Controllers\ProgramController::class, 'showPenceramahProgram'])->name('penceramah.program.show');
Route::PUT('penceramah-program/{id}/kemaskini', [App\Http\Controllers\ProgramController::class, 'updatePenceramahProgram'])->name('penceramah.program.update');

//Peserta Program
Route::GET('program/{id}/maklumat-senarai-peserta', [App\Http\Controllers\ProgramController::class, 'senaraiPeserta'])->name('show.senarai.peserta');
Route::GET('program/{id}/permohonan-peserta', [App\Http\Controllers\ProgramController::class, 'senaraiPermohonanPeserta'])->name('senarai.permohonan.peserta');
Route::GET('program/{idProgram}/pengesahan-permohonan-peserta/{idPengguna}', [App\Http\Controllers\ProgramController::class, 'pengesahanPermohonanPeserta'])->name('pengesahan.permohonan.peserta');
Route::PUT('program/{id}/kemaskini-senarai-peserta', [App\Http\Controllers\ProgramController::class, 'updateSenaraiPeserta'])->name('update.senarai.peserta');
Route::GET('program/{id_program}/hapus-peserta/{id_peserta}', [App\Http\Controllers\ProgramController::class, 'deletePeserta'])->name('delete.peserta');

Route::GET('program/senarai-peserta-program', [App\Http\Controllers\ProgramController::class, 'pesertaProgram'])->name('program.senarai-peserta');
Route::GET('program/permohonan-peserta-program', [App\Http\Controllers\ProgramController::class, 'pesertaProgram'])->name('program.permohonan-peserta');
Route::GET('program/kehadiran-peserta-program', [App\Http\Controllers\ProgramController::class, 'pesertaProgram'])->name('program.kehadiran-peserta');

//Permohonan Peserta Program
Route::POST('program/{id}/mohon-peserta-individu', [App\Http\Controllers\UserController::class, 'daftarPesertaProgram'])->name('mohon.peserta.individu');
Route::GET('program/{id}/batal-peserta-individu', [App\Http\Controllers\UserController::class, 'batalPenyertaanProgram'])->name('batal.peserta.individu');
Route::GET('program/{id}/borang-peserta-individu', [App\Http\Controllers\UserController::class, 'borangPesertaProgram'])->name('borang.peserta.individu');
Route::GET('program/senarai-permohonan-individu', [App\Http\Controllers\UserController::class, 'senaraiPermohonanProgram'])->name('senarai.permohonan.individu');
Route::GET('program/senarai-penyertaan-individu', [App\Http\Controllers\UserController::class, 'senaraiPenyertaanProgram'])->name('senarai.penyertaan.individu');

//Kajiselidik Peserta Program
Route::GET('program/{idProgram}/jawab-kaji-selidik',  [App\Http\Controllers\UserController::class, 'createKajiSelidik'])->name('create.peserta.kajiselidik');
Route::POST('program/{idProgram}/tambah-kaji-selidik',  [App\Http\Controllers\UserController::class, 'storeKajiSelidik'])->name('store.peserta.kajiselidik');
Route::GET('/senarai-kaji-selidik', [App\Http\Controllers\KajiSelidikController::class, 'index'])->name('kaji-selidik.index');
Route::GET('/senarai-kaji-selidik-pengguna', [App\Http\Controllers\KajiSelidikController::class, 'edit'])->name('kaji-selidik.edit');
Route::GET('kaji-selidik/{id}/graph', [App\Http\Controllers\KajiSelidikController::class, 'graph'])->name('kaji-selidik.graph');

//Slide Program
Route::GET('program/{id}/slide', [App\Http\Controllers\ProgramController::class, 'slide'])->name('program.slide');
Route::POST('program/{id}/kemaskini-slaid', [App\Http\Controllers\ProgramController::class, 'kemaskiniSlaid'])->name('program.kemaskini-slaid');
Route::GET('program/{id}/hapus-slaid', [App\Http\Controllers\ProgramController::class, 'hapusSlaid'])->name('program.hapus-slaid');

// Aturcara Program
Route::GET('program/{id}/aturcara', [App\Http\Controllers\ProgramController::class, 'aturcara'])->name('program.aturcara');
Route::POST('program/{id}/kemaskini-aturcara', [App\Http\Controllers\ProgramController::class, 'kemaskiniAturcara'])->name('program.kemaskini-aturcara');
Route::GET('program/{id}/hapus-aturcara', [App\Http\Controllers\ProgramController::class, 'hapusAturcara'])->name('program.hapus-aturcara');

//Kehadiran Program
Route::GET('program/{id}/kehadiran', [App\Http\Controllers\ProgramController::class, 'kehadiran'])->name('program.kehadiran');
Route::POST('program/{id}/kemaskini-kehadiran', [App\Http\Controllers\ProgramController::class, 'kemaskiniKehadiran'])->name('program.kemaskini-kehadiran');
Route::GET('program/{idProgram}/batal/{idPeserta}/tarikh/{tarikh}', [App\Http\Controllers\ProgramController::class, 'batalKehadiran'])->name('program.batal-kehadiran');
Route::GET('program/qrcode/kehadiran/{id}', [App\Http\Controllers\ProgramController::class, 'janaQRCodeKehadiran'])->name('program.qrcode-kehadiran');
Route::GET('kehadiran/{uuid}', [App\Http\Controllers\PublicController::class, 'pengesahanKehadiran'])->name('program.pengesahan-kehadiran');
Route::POST('program/{id}/daftar-kehadiran', [App\Http\Controllers\PublicController::class, 'daftarKehadiran'])->name('program.daftar-kehadiran');


Route::GET('kehadiran/{id}/edit', [App\Http\Controllers\KehadiranController::class, 'edit'])->name('kehadiran.edit');
Route::PUT('kehadiran/{id}/update', [App\Http\Controllers\KehadiranController::class, 'update'])->name('kehadiran.update');

//Sijil Penyertaan
Route::GET('program/sijil/{url_sijil}', [App\Http\Controllers\ProgramController::class, 'sijil'])->name('program.sijil');
Route::GET('pengesahan/sijil/{url_sijil}', [App\Http\Controllers\PublicController::class, 'sijil'])->name('pengesahan.sijil');


// Gambar program
Route::POST('/program/{id}/simpan-gambar', [App\Http\Controllers\GambarProgramController::class, 'store'])->name('program.simpan-gambar');
Route::GET('senarai-gambar-program/{id}/maklumat', [App\Http\Controllers\GambarProgramController::class, 'show'])->name('gambar.program.show');
Route::GET('senarai-gambar-program/{id}/hapus',  [App\Http\Controllers\GambarProgramController::class, 'destroy'])->name('gambar.program.destroy');


// Pengguna
Route::GET('senarai-pengguna', [App\Http\Controllers\UserController::class, 'index'])->name('senarai.pengguna');
Route::GET('/pengguna/{id}/hapus',  [App\Http\Controllers\UserController::class, 'delete'])->name('pengguna.destroy');
Route::GET('/pengguna/tambah',  [App\Http\Controllers\UserController::class, 'create'])->name('pengguna.create');
Route::GET('pengguna/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('pengguna.edit');
Route::POST('pengguna/store', [App\Http\Controllers\UserController::class, 'store'])->name('pengguna.store');
Route::POST('pengguna/tukar-katalaluan', [App\Http\Controllers\UserController::class, 'tukarKatalaluan'])->name('pengguna.tukar-katalaluan');
Route::PUT('pengguna/{id}/update', [App\Http\Controllers\UserController::class, 'update'])->name('pengguna.update');


Route::GET('maklumat-pengguna/{id}', [App\Http\Controllers\UserController::class, 'maklumatPengguna'])->name('pengguna.maklumatpengguna');

// Route::GET('maklumat-pengguna/{id}', [App\Http\Controllers\UserController::class, 'maklumatPengguna'])->name('maklumatpengguna.pengguna'); //??



//Tempat Program
Route::GET('tempat_program', [App\Http\Controllers\TempatProgramController::class, 'index'])->name('tempat_program.index');
Route::GET('tempat_program/tambah', [App\Http\Controllers\TempatProgramController::class, 'create'])->name('tempat_program.create');
Route::GET('tempat_program/{id}/edit', [App\Http\Controllers\TempatProgramController::class, 'edit'])->name('tempat_program.edit');
Route::POST('tempat_program/store', [App\Http\Controllers\TempatProgramController::class, 'store'])->name('tempat_program.store');
Route::POST('tempat_program/{id}/update', [App\Http\Controllers\TempatProgramController::class, 'update'])->name('tempat_program.update');
Route::GET('tempat_program/{id}/hapus', [App\Http\Controllers\TempatProgramController::class, 'delete'])->name('tempat_program.destroy');

//Makluman
Route::GET('senarai-makluman',  [App\Http\Controllers\MaklumanController::class, 'index'])->name('makluman.index');
Route::GET('makluman/tambah',  [App\Http\Controllers\MaklumanController::class, 'create'])->name('makluman.create');
Route::GET('makluman/{id}/edit', [App\Http\Controllers\MaklumanController::class, 'edit'])->name('makluman.edit');
Route::POST('makluman/store', [App\Http\Controllers\MaklumanController::class, 'store'])->name('makluman.store');
Route::POST('makluman/{id}/update', [App\Http\Controllers\MaklumanController::class, 'update'])->name('makluman.update');
Route::GET('makluman/{id}/hapus',  [App\Http\Controllers\MaklumanController::class, 'destroy'])->name('makluman.destroy');

//profile
Route::GET('profile/index', [App\Http\Controllers\UserController::class, 'profile'])->name('profile.index'); //okey
Route::GET('profile/{id}/edit', [App\Http\Controllers\UserController::class, 'editProfile'])->name('profile.edit');
Route::put('profile/kemaskini', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('profile.update');

Route::GET('reset_password/index', [App\Http\Controllers\UserController::class, 'resetPassword'])->name('reset_password.index');

//captcha
Route::get('/reload-captcha', [App\Http\Controllers\Auth\RegisterController::class, 'reloadCaptcha']);


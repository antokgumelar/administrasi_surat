<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/akun-admin', function () {
    return view('akun-admin');
})->name('akun-admin');

// user
Route::get('/login-user', function() {
    return view('login-user');
})->name('login-user');

// admin
Route::get('/login-admin', function () {
    return view('login-admin');
})->name('login-admin');

Route::get('/home-admin', function() {
    return view('home-admin');
})->middleware('auth')->name('home-admin');

Route::get('/input-surat-admin', function () {
    return view('input-surat-admin');
})->name('input-surat-admin');

Route::get('/surat-baru-admin', function() {
    return view('surat-baru-admin');
})->name('surat-baru-admin');

Route::get('/disposisi-admin', function () {
    return view('disposisi-admin');
})->name('disposisi-admin');

Route::get('disposisi-admin-baru', function() {
    return view('disposisi-admin-baru');
})->name('disposisi-admin-baru');

Route::get('/laporan-admin', function () {
    return view('laporan-admin');
})->name('laporan-admin');

Route::get('/perangkat-daerah', function() {
    return view('auth.perangkat-daerah');
})->name('perangkat-daerah');

Route::get('/opsional-admin', function() {
    return view('opsional-admin');
})->name('opsional-admin');

// ---------------------------------------------------

use App\Http\Controllers\AuthController;

Route::get('register-admin', [AuthController::class, 'showRegisterAdminForm'])->name('register-admin');
Route::post('register-admin', [AuthController::class, 'register_admin']);
Route::get('login-admin', [AuthController::class, 'showLoginForm'])->name('login-admin');
Route::post('login-admin', [AuthController::class, 'login_admin']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('login-user', [AuthController::class, 'showLoginInstansi'])->name('login-user');
Route::post('/login-user', [AuthController::class, 'login_user'])->name('login-user');
Route::post('logoutUser', [AuthController::class, 'logoutUser'])->name('logoutUser');

Route::get('register-pemda', [AuthController::class, 'showRegisterPemda'])->name('register-pemda');
Route::post('register-pemda', [AuthController::class, 'register_pemda']);


// -------------------------------------------------------------------------

use App\Http\Controllers\PemdaController;
    Route::get('surat-pemda', [PemdaController::class, 'showSuratTabel'])->name('surat-pemda');
    Route::get('surat-pemda', [PemdaController::class, 'daftarSurat'])->name('surat-pemda');
    Route::get('/lihat-dokumen/{id}', [PemdaController::class, 'lihatDokumen'])->name('surat.lihat');
    Route::get('/disposisi-pemda/{kode_surat}', [PemdaController::class, 'pilihDispo'])->name('disposisi-pemda.pilih');
    Route::get('disposisi-pemda', [PemdaController::class, 'tujuanDispo'])->name('disposisi-pemda.tujuan');
    Route::post('disposisi-pemda', [PemdaController::class, 'inputDisposisi'])->name('dispo.inputDisposisi');
    Route::get('laporan-pemda', [PemdaController::class, 'laporan_pemda'])->name('laporan-pemda');
    Route::get('laporan-pemda', [PemdaController::class, 'daftarJenis'])->name('laporan-pemda');
    Route::get('/laporan-pemda', [PemdaController::class, 'lapor'])->name('laporan-pemda');
    Route::get('home-pemda', [PemdaController::class,'index'])->name('home-pemda');

Route::middleware(['auth'])->group(function () {
});
use App\Http\Controllers\AdminController;
Route::middleware(['auth'])->group(function () {
    Route::get('home-admin', [AdminController::class, 'home_admin'])->name('home-admin');
    Route::get('disposisi-admin',[AdminController::class, 'disposisi_admin'])->name('disposisi-admin');
    Route::get('/get-surat/{kode_surat}', [AdminController::class, 'getSurat']);
    Route::get('disposisi-admin/{kode_surat}', [AdminController::class, 'dispoForm'])->name('disposisi-admin.dispo');
    Route::get('disposisi-admin-baru', [AdminController::class, 'daftarDispo'])->name('disposisi-admin-baru');
    Route::get('surat-baru-admin', [AdminController::class, 'surat_baru_admin'])->name('surat-baru-admin');
    Route::get('surat-baru-admin',[AdminController::class, 'daftarSurat'])->name('surat-baru-admin');
    Route::get('input-surat-admin', [AdminController::class, 'input_surat_admin'])->name('input-surat-admin');
    Route::get('input-surat-admin', [AdminController::class, 'daftarDropdown'])->name('input-surat-admin');
    Route::post('input-surat-admin', [AdminController::class, 'inputSuratAdmin'])->name('surat.inputSuratAdmin');
    Route::post('disposisi-admin', [AdminController::class, 'inputDispo'])->name('dispo.inputDispo');
    Route::get('laporan-admin', [AdminController::class, 'laporan_admin'])->name('laporan-admin');
    Route::get('laporan-admin', [AdminController::class, 'daftarJenis'])->name('laporan-admin');
    Route::get('/laporan-admin', [AdminController::class, 'lapor'])->name('laporan-admin');
});

// ----------------------------------------------------

use App\Http\Controllers\InstansiController;

Route::get('perangkat-daerah', [InstansiController::class, 'showInstansi'])->name('perangkat-daerah');
Route::post('perangkat-daerah', [InstansiController::class, 'store'])->name('instansi.store');
Route::get('perangkat-daerah', [InstansiController::class, 'daftarPerangkat'])->name('perangkat-daerah');
Route::delete('perangkat-daerah/{id}', [InstansiController::class, 'hapusPerangkat'])->name('instansi.hapusPerangkat');
Route::get('perangkat-daerah-edit/{id}', [InstansiController::class, 'pilihPerangkat'])->name('perangkat-daerah-edit');
Route::put('/perangkat-daerah-edit/{id}', [InstansiController::class, 'updatePerangkat'])->name('instansi.updatePerangkat');
Route::get('laporan-perangkat', [InstansiController::class, 'laporan_perangkat'])->name('laporan-perangkat');
Route::get('laporan-perangkat', [InstansiController::class, 'daftarJenis'])->name('daftarJenis');
Route::get('/laporan-perangkat', [InstansiController::class, 'lapor'])->name('laporan-perangkat');
// -----------------------------------------------------

use App\Http\Controllers\UserController;
Route::get('cari-surat', [UserController::class, 'index'])->name('cari-surat');
Route::get('cari-surat',[UserController::class, 'cariSurat'])->name('cari-surat');
// --------------------------------------------------------
use App\Http\Controllers\JenisController;
Route::get('opsional-admin', [JenisController::class, 'showJenis'])->name('opsional-admin');    
Route::post('opsional-admin', [JenisController::class, 'inputJenis'])->name('JenisSurat.inputJenis');
Route::get('opsional-admin', [JenisController::class, 'daftarOpsional'])->name('opsional-admin');
Route::delete('opsional-admin/{id}', [JenisController::class, 'hapusOpsi'])->name('JenisSurat.hapusOpsi');


Route::middleware(['auth:instansi'])->group(function () {
    Route::get('/home-perangkat', [InstansiController::class,'index'])->name('home-perangkat');
    Route::get('/show-dispo/{kode_surat}', [InstansiController::class, 'showDispo'])->name('dispo.show');
    Route::get('surat-perangkat', [InstansiController::class, 'showdaftarDispo'])->name('surat-perangkat');
});

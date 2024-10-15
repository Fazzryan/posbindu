<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\be\auth\ConAuth;
use App\Http\Controllers\be\dashboard\ConDashboard;
use App\Http\Controllers\be\laporan\ConLaporan;
use App\Http\Controllers\be\pasien\ConPasien;
use App\Http\Controllers\be\pemeriksaan\ConPemeriksaan;
use App\Http\Controllers\be\pendaftaran\ConPendaftaran;
use App\Http\Controllers\be\profile\ConProfile;
use App\Http\Controllers\be\riwayat\ConRiwayat;
use App\Http\Controllers\be\wawancara\ConWawancara;
use App\Http\Controllers\fe\ConBeranda;
use App\Http\Controllers\fe\identitas\ConIdentitas;
use App\Http\Controllers\fe\riwayat\ConRiwayat as ConRiwayatBeranda;

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


Route::group(['as' => 'auth.', 'prefix' => '/'],  function () {
    Route::get('/login', [ConAuth::class, 'index'])->name('login');
    Route::get('/registrasi', [ConAuth::class, 'register'])->name('register');

    Route::post('/act_login', [ConAuth::class, 'actLogin'])->name('actLogin');
    Route::post('/act_register', [ConAuth::class, 'actRegister'])->name('actRegister');
    Route::get('/act_logout', [ConAuth::class, 'actLogout'])->name('actLogout');
});

//--------------------------------------------------------------------------
//  Route Frontend
//--------------------------------------------------------------------------
Route::group(['as' => 'fe.', 'prefix' => '/'],  function () {

    Route::get('/', [ConBeranda::class, 'index'])->name('beranda');
    Route::get('/edukasi', [ConBeranda::class, 'edukasi'])->name('edukasi');

    //--------------------------------------------------------------------------
    //  Route Identitas
    //--------------------------------------------------------------------------
    Route::group(['as' => 'identitas.', 'prefix' => '/identitas'],  function () {
        Route::get('/', [ConIdentitas::class, 'index'])->name('show');

        Route::post('/act_edit', [ConIdentitas::class, 'act_edit'])->name('act_edit');
    });

    //--------------------------------------------------------------------------
    //  Route Riwayat 'middleware' => 'CekSession'
    //--------------------------------------------------------------------------
    Route::group(['as' => 'riwayat.', 'prefix' => '/riwayat'],  function () {
        Route::get('/list', [ConRiwayatBeranda::class, 'index'])->name('list');
    });
});

//--------------------------------------------------------------------------
//  Route Beckend
//--------------------------------------------------------------------------
Route::group(['as' => 'be.', 'prefix' => '/dashboard', 'middleware' => ['CekSession', 'IsAdmin']],  function () {

    //--------------------------------------------------------------------------
    //  Route Dashboard
    //--------------------------------------------------------------------------
    Route::get('/', [ConDashboard::class, 'index'])->name('dashboard');

    //--------------------------------------------------------------------------
    //  Route Pendaftaran
    //--------------------------------------------------------------------------
    Route::group(['as' => 'pendaftaran.', 'prefix' => '/pendaftaran'],  function () {
        Route::get('/list', [ConPendaftaran::class, 'index'])->name('list');

        // act show
        // act add
        Route::post('/act_add', [ConPendaftaran::class, 'act_add'])->name('act_add');
        // act edit
        // act delete
    });
    //--------------------------------------------------------------------------
    //  Route Wawancara
    //--------------------------------------------------------------------------
    Route::group(['as' => 'wawancara.', 'prefix' => '/wawancara'],  function () {
        Route::get('/list', [ConWawancara::class, 'index'])->name('list');
        Route::get('/add', [ConWawancara::class, 'add'])->name('add');
        Route::get('/edit/{id?}', [ConWawancara::class, 'edit'])->name('edit');

        // act show
        Route::get('/detail/{id?}', [ConWawancara::class, 'show'])->name('show');
        // act add
        Route::post('/act_add', [ConWawancara::class, 'act_add'])->name('act_add');
        // act edit
        Route::post('/act_edit', [ConWawancara::class, 'act_edit'])->name('act_edit');
        // act delete
        Route::post('/act_delete', [ConWawancara::class, 'act_delete'])->name('act_delete');
    });

    //--------------------------------------------------------------------------
    //  Route Pemeriksaan
    //--------------------------------------------------------------------------
    Route::group(['as' => 'pemeriksaan.', 'prefix' => '/pemeriksaan'],  function () {
        Route::get('/list', [ConPemeriksaan::class, 'index'])->name('list');
        Route::get('/add', [ConPemeriksaan::class, 'add'])->name('add');
        Route::get('/edit/{id?}', [ConPemeriksaan::class, 'edit'])->name('edit');

        // act show
        Route::get('/detail/{id?}', [ConPemeriksaan::class, 'show'])->name('show');

        // act add
        Route::post('/act_add', [ConPemeriksaan::class, 'act_add'])->name('act_add');

        // act edit
        Route::post('/act_edit', [ConPemeriksaan::class, 'act_edit'])->name('act_edit');

        // act delete
        Route::post('/act_delete', [ConPemeriksaan::class, 'act_delete'])->name('act_delete');
    });

    //--------------------------------------------------------------------------
    //  Route Riwayat
    //--------------------------------------------------------------------------
    Route::group(['as' => 'riwayat.', 'prefix' => '/riwayat'],  function () {
        Route::get('/list', [ConRiwayat::class, 'index'])->name('list');
        Route::get('/add', [ConRiwayat::class, 'add'])->name('add');
        Route::get('/edit/{id?}', [ConRiwayat::class, 'edit'])->name('edit');

        // act show
        Route::get('/detail/{id?}', [ConRiwayat::class, 'show'])->name('show');

        // act add
        Route::post('/act_add', [ConRiwayat::class, 'act_add'])->name('act_add');

        // act edit
        Route::post('/act_edit', [ConRiwayat::class, 'act_edit'])->name('act_edit');

        // act delete
        Route::post('/act_delete', [ConRiwayat::class, 'act_delete'])->name('act_delete');
    });

    //--------------------------------------------------------------------------
    //  Route Pasien
    //--------------------------------------------------------------------------
    Route::group(['as' => 'pasien.', 'prefix' => '/pasien'],  function () {
        Route::get('/list', [ConPasien::class, 'index'])->name('list');
        // act show
        Route::get('/detail/{id?}', [ConPasien::class, 'show'])->name('show');
        Route::get('/edit/{id?}', [ConPasien::class, 'edit'])->name('edit');
        // act add
        // act edit
        Route::post('/act_edit', [ConPasien::class, 'act_edit'])->name('act_edit');

        // act delete
        Route::post('/act_delete', [ConPasien::class, 'act_delete'])->name('act_delete');
    });

    //--------------------------------------------------------------------------
    //  Route Profile
    //--------------------------------------------------------------------------
    Route::group(['as' => 'profile.', 'prefix' => '/profile'],  function () {
        Route::get('/list', [ConProfile::class, 'index'])->name('list');
        Route::get('/add', [ConProfile::class, 'add'])->name('add');
        Route::get('/detail/{id?}', [ConProfile::class, 'detail'])->name('detail');

        // act edit
        Route::post('/act_add', [ConProfile::class, 'act_add'])->name('act_add');

        // act edit
        Route::post('/act_edit', [ConProfile::class, 'act_edit'])->name('act_edit');
        Route::post('/act_edit_autentikasi', [ConProfile::class, 'act_edit_autentikasi'])->name('act_edit_autentikasi');

        // act delete
        Route::post('/delete', [ConProfile::class, 'delete'])->name('delete');
    });

    //--------------------------------------------------------------------------
    //  Route Laporan
    //--------------------------------------------------------------------------
    Route::group(['as' => 'laporan.', 'prefix' => '/laporan'],  function () {
        Route::get('/list', [ConLaporan::class, 'index'])->name('list');
    });
});

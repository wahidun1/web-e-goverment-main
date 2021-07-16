<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataPendudukController;
use App\Http\Controllers\DataPermintaanController;
use App\Http\Controllers\DataSuratController;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\PendudukPindahController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DataPengaduanController;
use App\Models\DataPenduduk;

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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/proses_login', [AuthController::class, 'proses_login'])->name('proses_login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Route::get('/master', function () {
//     return view('layouts.masteradmin');
// });

// Auth::routes();




// Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'home'])->name('admin.home')->middleware('role');


Route::prefix('admin')->middleware('auth', 'role:admin')->group(function () {
    //data guru admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin/dashboard');
    Route::get('/datapenduduk', [DataPendudukController::class, 'index'])->name('admin/datapenduduk');
    Route::post('/datapenduduk/tambah', [DataPendudukController::class, 'tambah']);
    Route::get('/datapenduduk/{id}/detail', [DataPendudukController::class, 'detail']);
    Route::get('/datapenduduk/{id}/hapus', [DataPendudukController::class, 'hapus']);
    Route::post('/datapenduduk/{id}/edit', [DataPendudukController::class, 'edit']);

    Route::get('/kartukeluarga', [KartuKeluargaController::class, 'index'])->name('admin/kartukeluarga');
    Route::get('/kartukeluarga/{id}/detail', [KartuKeluargaController::class, 'detail']);
    Route::post('/kartukeluarga/tambah', [KartuKeluargaController::class, 'tambah']);
    Route::get('/kartukeluarga/{id}/hapus', [KartuKeluargaController::class, 'hapus']);
    Route::post('/kartukeluarga/{id}/edit', [KartuKeluargaController::class, 'edit']);

    Route::get('/penduduktetap', [DataPendudukController::class, 'penduduktetap'])->name('admin/penduduktetap');

    Route::get('/datasurat', [DataSuratController::class, 'index'])->name('admin/datasurat');
    Route::post('/datasurat/tambah', [DataSuratController::class, 'tambah']);
    Route::get('/datasurat/{id}/hapus', [DataSuratController::class, 'hapus']);
    Route::get('/datasurat/download/{contohsurat}', [DataSuratController::class, 'download']);

    Route::get('/datapermintaan', [DataPermintaanController::class, 'index'])->name('admin/datapermintaan');
    Route::post('/datapermintaan/tambah', [DataPermintaanController::class, 'tambah']);
    Route::get('/datapermintaan/{id}/hapus', [DataPermintaanController::class, 'hapus']);
    Route::post('/datapermintaan/{id}/edit', [DataPermintaanController::class, 'edit']);
    Route::get('/datapermintaan/download/{filesurat}', [DataPermintaanController::class, 'download']);

    Route::get('/profile', [ProfileController::class, 'index'])->name('admin/profile');

    Route::get('/datapengaduan', [DataPengaduanController::class, 'index'])->name('admin/datapengaduan');
    Route::get('/datapengaduan/download/{filesurat}', [DataPengaduanController::class, 'download']);
    Route::post('/datapengaduan/{id}/edit', [DataPengaduanController::class, 'edit']);
});


Route::prefix('user')->middleware('auth', 'role:user')->group(function () {
    //data guru admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user/dashboard');

    Route::get('/datapermintaan', [DataPermintaanController::class, 'index'])->name('user/datapermintaan');
    Route::post('/datapermintaan/tambah', [DataPermintaanController::class, 'tambah']);
    Route::get('/datapermintaan/download/{filepengaduan}', [DataPermintaanController::class, 'download']);
    // Route::get('/datapermintaan/{id}/hapus', [DataPermintaanController::class, 'hapus']);

    Route::get('/datasurat/download/{contohsurat}', [DataSuratController::class, 'download']);
    Route::get('/datasurat', [DataSuratController::class, 'index'])->name('user/datasurat');

    Route::get('/datapengaduan', [DataPengaduanController::class, 'index'])->name('user/datapengaduan');
    Route::post('/datapengaduan/tambah', [DataPengaduanController::class, 'tambah']);

    Route::get('/datapengaduan/{id}/hapus', [DataPengaduanController::class, 'hapus']);
});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

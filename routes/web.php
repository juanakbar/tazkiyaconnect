<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Administrator\KelasController;
use App\Http\Controllers\Administrator\PrestasiController;
use App\Http\Controllers\Administrator\SiswaController;
use App\Http\Controllers\Administrator\TaskController;
use App\Http\Controllers\Administrator\WaliKelasController;
use App\Http\Controllers\Administrator\WaliMuridController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WaliKelas\KelasController as WaliKelasKelasController;
use App\Http\Controllers\WaliKelas\KHSController;
use App\Http\Controllers\WaliKelas\SiswaController as WaliKelasSiswaController;
use App\Http\Controllers\WaliMurid\SiswaController as WaliMuridSiswaController;

Route::get('/', function () {
    return redirect('login');
})->name('welcome');

Route::get('/dashboard', DashboardController::class)->name('dashboard')->middleware('auth');

Route::prefix('administrator')->middleware(['auth', 'role:SuperAdmin'])->group(function () {
    Route::resource('walimurid', WaliMuridController::class);
    Route::get('walimurid/{slug}/siswa', [WaliMuridController::class, 'siswa'])->name('siswa.WaliMurid');
    Route::get('walimurid/{slug}/addsiswa', [WaliMuridController::class, 'addSiswa'])->name('siswa.addSiswa');
    Route::resource('walikelas', WaliKelasController::class);
    Route::resource('kelas', KelasController::class);
    Route::get('kelas/{slug}/khs', [KelasController::class, 'show'])->name('kelas_khs');
    Route::get('kelas/{slug}/siswa', [KelasController::class, 'siswa'])->name('siswa_kelas');
    Route::get('assign_wali_kelas/{slug}', [KelasController::class, 'assignWaliKelas'])->name('assign_wali_kelas');
    Route::post('assign_wali_kelas/{slug}', [KelasController::class, 'assignWaliKelasPost'])->name('assign_wali_kelas');
    Route::resource('khs', TaskController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('prestasi', PrestasiController::class);
});
Route::prefix('walikelas')->middleware(['auth', 'role:WaliKelas'])->group(function () {
    Route::resource('/kelas-anda', WaliKelasKelasController::class);
    Route::resource('/task', KHSController::class);
    Route::resource('/murid-anda', WaliKelasSiswaController::class);
    Route::get('/penilaian/{siswa}', [WaliKelasSiswaController::class, 'penilaian'])->name('penilaian_siswa');
    Route::get('/penilaian/{siswa}/edit', [WaliKelasSiswaController::class, 'updatePenilaian'])->name('update-penilaian_siswa');
    Route::post('/penilaian/{siswa}', [WaliKelasSiswaController::class, 'penilaian_post'])->name('penilaian_post');
    Route::put('/penilaian/{siswa}', [WaliKelasSiswaController::class, 'penilaian_put'])->name('penilaian_put');
});

Route::prefix('walimurid')->middleware(['auth', 'role:WaliMurid'])->group(function () {
    Route::get('siswa-anda/{siswa}', [WaliMuridSiswaController::class, 'show'])->name('siswa_anda');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
// API
Route::prefix('api')->group(function () {
    // 
});

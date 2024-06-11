<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Administrator\KelasController;
use App\Http\Controllers\Administrator\SiswaController;
use App\Http\Controllers\Administrator\TaskController;
use App\Http\Controllers\Administrator\WaliKelasController;
use App\Http\Controllers\Administrator\WaliMuridController;


Route::get('/', function () {
    return redirect('login');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::prefix('administrator')->middleware(['auth', 'role:SuperAdmin'])->group(function () {
    Route::resource('walimurid', WaliMuridController::class);
    Route::get('walimurid/{slug}/siswa', [WaliMuridController::class, 'siswa'])->name('siswa.WaliMurid');
    Route::get('walimurid/{slug}/addsiswa', [WaliMuridController::class, 'addSiswa'])->name('siswa.addSiswa');
    Route::resource('walikelas', WaliKelasController::class);
    Route::resource('kelas', KelasController::class);
    Route::get('kelas/{slug}/khs', [KelasController::class, 'show'])->name('kelas_khs');
    Route::get('assign_wali_kelas/{slug}', [KelasController::class, 'assignWaliKelas'])->name('assign_wali_kelas');
    Route::post('assign_wali_kelas/{slug}', [KelasController::class, 'assignWaliKelasPost'])->name('assign_wali_kelas');
    Route::resource('khs', TaskController::class);
    Route::resource('siswa', SiswaController::class);
    // Route::get('siswa?/siswa', [SiswaController::class, 'index'])->name('siswa.create');
});
Route::prefix('walimurid')->middleware(['auth', 'role:WaliKelas|SuperAdmin'])->group(function () {
    // 
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

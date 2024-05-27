<?php

use App\Models\City;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use App\Models\WaliMurid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\ProfileController;
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
    Route::resource('walikelas', WaliKelasController::class);
});
Route::prefix('walimurid')->middleware(['auth', 'role:WaliMurid'])->group(function () {
    Route::get('/dasboard', function () {
        return 'JUJUN SIGA KONTOL';
    })->name('dashboard_wali_murid');
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

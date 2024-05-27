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
use App\Http\Controllers\Administrator\WaliMuridController;

Route::get('/', function () {
    return redirect('login');
})->name('welcome');

Route::prefix('administrator')->middleware(['auth', 'role:SuperAdmin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('walimurid', WaliMuridController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
// API
Route::prefix('api')->group(function () {
    Route::get('province', function () {
        return response()->json(Province::get(['code', 'name']));
    })->name('province_api');
    Route::get('cities/{province_code}', function (Request $request) {
        return response()->json(City::where('province_code', $request->province_code)->get(['code', 'name']));
    })->name('city_api');

    Route::get('/districts/{cityCode}', function ($cityCode) {
        $districts = District::where('city_code', $cityCode)->get();
        return response()->json($districts);
    });

    Route::get('/villages/{districtCode}', function ($districtCode) {
        $villages = Village::where('district_code', $districtCode)->get();
        return response()->json($villages);
    });
});

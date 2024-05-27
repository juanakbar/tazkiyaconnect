<?php

use App\Models\WaliMurid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\Facades\DataTables;

Route::get('/user', function (Request $request) {
    return $request->user();
});

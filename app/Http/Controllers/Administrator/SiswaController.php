<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    // public function index()
    // {
    //     return view('')
    // }
    public function index(string $slug, Request $request)
    {
        if ($request->has($slug)) {
            dd(true);
        }

        return view('administrator.siswa.create');
    }
}

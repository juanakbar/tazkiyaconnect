<?php

namespace App\Http\Controllers\WaliKelas;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelasController extends Controller
{
    public function index()
    {
        $kelass = Kelas::query()->with('siswas');
        $kelass = auth()->user()->role == 'SuperAdmin'
            ? $kelass->get()
            : $kelass->where('wali_kelas_id', auth()->user()->waliKelas->id)->get();

        return view('walikelas.kelas.index', [
            'kelass' => $kelass,
        ]);
    }
}

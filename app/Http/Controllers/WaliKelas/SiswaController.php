<?php

namespace App\Http\Controllers\WaliKelas;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $siswas = Kelas::query()->with('siswas')->where('slug', $request->kelas)->firstOrFail();
        // ddd($siswas);
        return view('waliKelas.siswa.index', [
            'siswas' => $siswas
        ]);
    }

    public function show($siswa)
    {
        $siswa = Siswa::query()->with('waliMurid')->where('id', $siswa)->firstOrFail();
        $tasks = $siswa->tasks; // Mengambil semua tasks yang terkait dengan siswa tersebut

        return view('walikelas.siswa.khssiwa', [
            'siswa' => $siswa
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Prestasi;
use App\Models\User;
use App\Models\WaliKelas;
use App\Models\WaliMurid;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $allSiswas = Siswa::count();
        $walimurids = WaliMurid::count();
        $walikelas = WaliKelas::count();
        $prestasis = Prestasi::query()->with('siswa')->get();
        $siswas = Siswa::query()->where('wali_murid_id', auth()->user()->id)->get();
        return view('dashboard', [
            'allSiswas' => $allSiswas,
            'walimurids' => $walimurids,
            'walikelas' => $walikelas,
            'prestasis' => $prestasis,
            'siswas' => $siswas
        ]);
    }
}

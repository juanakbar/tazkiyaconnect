<?php

namespace App\Http\Controllers\WaliMurid;

use Carbon\Carbon;
use App\Models\Siswa;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    public function show($siswa, Request $request)
    {
        $siswa = Siswa::query()->with('waliMurid')->where('id', $siswa)->firstOrFail();
        $created_at = $request->input('created_at', Carbon::today()->toDateString());

        // Query dengan tanggal yang didapat
        $penilaians = Penilaian::query()
            ->with('siswa', 'task')
            ->where('siswa_id', $siswa->id)
            ->whereDate('created_at', $created_at)
            ->get();
        return view('walimurid.show', [
            'siswa' => $siswa,
            'penilaians' => $penilaians
        ]);
    }
}

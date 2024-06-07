<?php

namespace App\Http\Controllers\Administrator;

use App\Models\Kelas;
use App\Models\WaliKelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::query()->with('tasks', 'waliKelas')->get();
        return view('administrator.kelas.index', [
            'kelas' => $kelas
        ]);
    }
    public function create()
    {
        return view('administrator.kelas.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'grade' => ['required', 'numeric'],
            'level' => ['required', 'numeric'],
        ]);
        // dd($validateData);
        Kelas::create($validateData);
        flash()->addSuccess('Data Kelas Berhasil Ditambahkan');
        return redirect()->route('kelas.index');
    }

    public function edit(string $slug)
    {
        $item = Kelas::where('slug', $slug)->first();
        $waliKelas = WaliKelas::all();
        return view('administrator.kelas.update', [
            'item' => $item, 'waliKelas' => $waliKelas
        ]);
    }

    public function update(string $slug, Request $request)
    {
        $kelas = Kelas::where('slug', $slug)->first();

        $validateData = $request->validate([
            'grade' => ['required', 'numeric'],
            'level' => ['required', 'numeric'],
        ]);
        $kelas->update($validateData);
        flash()->addSuccess('Data Kelas Berhasil Diubah');
        return redirect()->route('kelas.index');
    }

    public function destroy(string $slug)
    {
        try {
            // Cari data WaliKelas berdasarkan slug
            $kelas = Kelas::where('slug', $slug)->firstOrFail();
            // Hapus data WaliKelas dari database
            $kelas->delete();
            return response()->json(['success' => 'Item deleted successfully']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Item not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'There was an error deleting the item'], 500);
        }
    }
    public function assignWaliKelas(string $slug)
    {
        $waliKelas = WaliKelas::all();
        // dd($waliKelas);
        $kelas = Kelas::where('slug', $slug)->first();
        return view('administrator.kelas.assignWaliKelas', [
            'waliKelas' => $waliKelas, 'kelas' => $kelas
        ]);
    }

    public function assignWaliKelasPost(string $slug, Request $request)
    {
        $kelas = Kelas::where('slug', $slug)->first();
        $waliKelas = WaliKelas::where('id', $request->wali_kelas_id)->first();
        $kelas->update([
            'wali_kelas_id' => $waliKelas->id
        ]);
        flash()->addSuccess('Wali Kelas Berhasil Ditambahkan');
        return redirect()->route('kelas.index');
    }
}

<?php

namespace App\Http\Controllers\Administrator;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::get();
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

        return view('administrator.kelas.update', [
            'item' => $item
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
    public function assignWaliKelas(Kelas $kelas)
    {
        dd($kelas);
    }
}

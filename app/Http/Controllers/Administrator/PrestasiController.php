<?php

namespace App\Http\Controllers\Administrator;

use App\Models\Siswa;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasis = Prestasi::query()->with('siswa')->get();
        $siswas = Siswa::get();
        return view('administrator.prestasi.index', [
            'prestasis' => $prestasis,
            'siswas' => $siswas
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => ['exists:App\Models\Siswa,id'],
            'name' => ['required', 'string'],
            'description' => ['required'],
        ]);

        Prestasi::create([
            'name' => $request->name,
            'siswa_id' => $request->siswa_id,
            'description' => $request->description
        ]);

        flash()->addSuccess('Data Prestasi Tersimpan');
        return redirect()->back();
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'siswa_id' => ['exists:App\Models\Siswa,id'],
            'name' => ['required', 'string'],
            'description' => ['required'],
        ]);
        $prestasi = Prestasi::where('id', $id)->first();
        $prestasi->update([
            'name' => $request->name,
            'siswa_id' => $request->siswa_id,
            'description' => $request->description
        ]);

        flash()->addSuccess('Data Prestasi Berhasil Diubah');
        return redirect()->route('khs.index');
    }
    public function destroy(string $id)
    {
        try {
            // Cari data WaliKelas berdasarkan slug
            $prestasi = Prestasi::where('id', $id)->firstOrFail();

            // Hapus data Prestas dari database
            $prestasi->delete();
            return response()->json(['success' => 'Item deleted successfully']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Item not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'There was an error deleting the item'], 500);
        }
    }
}

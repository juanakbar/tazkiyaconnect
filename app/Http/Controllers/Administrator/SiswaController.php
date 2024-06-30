<?php

namespace App\Http\Controllers\Administrator;

use Carbon\Carbon;
use App\Models\Kelas;
use App\Models\Siswa;
use Ramsey\Uuid\Uuid;
use App\Models\Penilaian;
use App\Models\WaliMurid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::query()->with(['waliMurid'])->get();
        // dd($siswas);
        return view('administrator.siswa.index', [
            'siswas' => $siswas
        ]);
    }
    public function create()
    {
        $walimurids = WaliMurid::all();
        $kelas = Kelas::all();
        return view('administrator.siswa.create', [
            'walimurids' => $walimurids,
            'kelas' => $kelas
        ]);
    }
    public function store(Request $request)
    {
        $siswa = $request->validate([
            'name' => ['required', 'string'],
            'wali_murid_id' => ['required', 'exists:App\Models\User,id'],
            'kelas_id' => ['required', 'exists:App\Models\Kelas,id'],
            'nis' => ['required', 'numeric'],
            'nisn' => ['required', 'numeric'],
            'tempat_lahir' => ['required', 'string'],
            'tanggal_lahir' => ['required', 'date'],
            'jenis_kelamin' => ['required'],

        ]);

        Siswa::create([
            'wali_murid_id' => $siswa['wali_murid_id'],
            'kelas_id' => $siswa['kelas_id'],
            'nis' => $siswa['nis'],
            'nisn' => $siswa['nisn'],
            'tempat_lahir' => $siswa['tempat_lahir'],
            'tanggal_lahir' => $siswa['tanggal_lahir'],
            'jenis_kelamin' => $siswa['jenis_kelamin'],
            'name' => $siswa['name'],
            'avatar' => $request->file('avatar')->storeAs('avatar/murids', Uuid::uuid4() . '_' . $request->file('avatar')->getClientOriginalName(), 'public')
        ]);
        flash()->addSuccess('Data Siswa Berhasil Ditambahkan');
        return redirect()->route('siswa.index');
    }

    public function edit(Siswa $siswa)
    {
        // dd($siswa);
        $walimurids = WaliMurid::all();
        $kelas = Kelas::all();
        return view('administrator.siswa.update', [
            'siswa' => $siswa,
            'walimurids' => $walimurids,
            'kelas' => $kelas
        ]);
    }

    public function update(Request $request, Siswa $siswa)
    {
        $siswa->update([
            'wali_murid_id' => $request->wali_murid_id,
            'kelas_id' => $request->kelas_id,
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'name' => $request->name,
        ]);
        if ($request->has('avatar')) {
            Storage::delete($siswa->avatar);
            $siswa->avatar = $request->file('avatar')->storeAs('avatar/siswa', $siswa->id . '_' . $siswa->slug, 'public');
            $siswa->save();
        }
        flash()->addSuccess('Data Siswa Berhasil Diubah');
        return redirect()->route('siswa.index');
    }

    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        try {
            // Periksa apakah avatar ada dan hapus jika ada
            if ($siswa->avatar && Storage::exists($siswa->avatar)) {
                Storage::delete($siswa->avatar);
            }

            $siswa->delete();
            return response()->json(['success' => 'Item deleted successfully']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Item not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'There was an error deleting the item'], 500);
        }
    }

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
        return view('administrator.siswa.khssiwa', [
            'siswa' => $siswa,
            'penilaians' => $penilaians
        ]);
    }
}

<?php

namespace App\Http\Controllers\Administrator;

use App\Models\User;
use App\Models\WaliKelas;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class WaliKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $walikelas = WaliKelas::get();
        return view('administrator.WaliKelas.index', [
            'walikelas' => $walikelas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrator.WaliKelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:' . User::class],
            'nip' => ['required', 'string', 'max:20'],
            'jenis_kelamin' => ['required', 'string'],
            'tingkat_pendidikan' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'avatar' => ['required', 'mimes:jpeg,jpg,png,gif'] // Ubah validasi menjadi 'image'
        ]);

        $user = User::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => Hash::make('password'),
        ]);

        WaliKelas::create([
            'user_id' => $user->id,
            'nip' => $validateData['nip'],
            'jenis_kelamin' => $validateData['jenis_kelamin'],
            'tingkat_pendidikan' => $validateData['tingkat_pendidikan'],
            'alamat' => $validateData['alamat'],
            'avatar' => $request->file('avatar')->storeAs('avatar/walikelas', $user->id . '_' . $request->file('avatar')->getClientOriginalName(), 'public')
        ]);
        $user->assignRole('WaliKelas');

        flash()->success('Wali Kelas Berhasil Ditambahkan');
        return redirect()->route('walikelas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $walikelas = WaliKelas::query()->with('user')->where('slug', $slug)->first();
        // dd($walimurid->tanggal_lahir);
        return view('administrator.WaliKelas.show', compact('walikelas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $walikelas = WaliKelas::query()->with('user')->where('slug', $slug)->first();
        if ($request->has('email') || $request->has('name')) {
            $user = User::where('id', $walikelas->user_id)->first();
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make(Str::slug($request->name)),
            ]);
        }
        $walikelas->update([
            'nip' => $request->nip,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tingkat_pendidikan' => $request->tingkat_pendidikan,
            'alamat' => $request->alamat,
        ]);
        if ($request->has('avatar')) {
            Storage::delete($walikelas->avatar);
            $walikelas->avatar = $request->file('avatar')->storeAs('avatar/walikelas', $walikelas->id . '_' . $walikelas->slug, 'public');
            $walikelas->save();
        }
        flash()->success('Data Wali Kelas Berhasil Diubah');
        return redirect()->route('walikelas.show', $walikelas->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        try {
            // Cari data WaliKelas berdasarkan slug
            $walikelas = WaliKelas::where('slug', $slug)->firstOrFail();
            $user = User::where('id', $walikelas->user_id)->firstOrFail();
            // Periksa apakah avatar ada dan hapus jika ada
            if ($walikelas->avatar && Storage::exists($walikelas->avatar)) {
                Storage::delete($walikelas->avatar);
            }

            // Hapus data WaliKelas dari database
            $walikelas->delete();
            $user->delete();
            return response()->json(['success' => 'Item deleted successfully']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Item not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'There was an error deleting the item'], 500);
        }
    }
}

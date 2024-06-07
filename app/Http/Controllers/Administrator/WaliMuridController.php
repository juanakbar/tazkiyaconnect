<?php

namespace App\Http\Controllers\Administrator;

use App\Models\City;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use App\Models\WaliMurid;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\WaliMuridResource;

class WaliMuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $walimurids = WaliMurid::with('user')->get();

        return view('administrator.WaliMurid.index', [
            'walimurids' => WaliMuridResource::collection($walimurids)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrator.WaliMurid.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:' . User::class],
            'nik' => ['required', 'string', 'max:20'],
            'agama' => ['required', 'string'],
            'tempat_lahir' => ['required', 'string'],
            'tanggal_lahir' => ['required', 'date'],
            'pendidikan' => ['required', 'string'],
            'pekerjaan' => ['required', 'string'],
            'kewarganeraan' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'avatar' => ['required', 'mimes:jpeg,jpg,png,gif'] // Ubah validasi menjadi 'image'
        ]);

        $user = User::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => Hash::make('password'),
            'avatar' => $request->file('avatar')->storeAs('avatar/users', Uuid::uuid4() . '_' . $request->file('avatar')->getClientOriginalName(), 'public')

        ]);

        WaliMurid::create([
            'user_id' => $user->id,
            'nik' => $validateData['nik'],
            'agama' => $validateData['agama'],
            'tempat_lahir' => $validateData['tempat_lahir'],
            'tanggal_lahir' => $validateData['tanggal_lahir'],
            'pendidikan' => $validateData['pendidikan'],
            'pekerjaan' => $validateData['pekerjaan'],
            'kewarganeraan' => $validateData['kewarganeraan'],
            'alamat' => $validateData['alamat'],
        ]);
        $user->assignRole('WaliMurid');

        flash()->success('Wali Murid Berhasil Ditambahkan');
        return redirect()->route('walimurid.index');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $walimurid = WaliMurid::query()->with('user')->where('slug', $slug)->first();
        // dd($walimurid->tanggal_lahir);
        return view('administrator.WaliMurid.show', compact('walimurid'));
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
        $walimurid = WaliMurid::query()->with('user')->where('slug', $slug)->first();
        if ($request->has('email') || $request->has('name')) {
            $user = User::where('id', $walimurid->user_id)->first();
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make(Str::slug($request->name)),
            ]);
        }
        $walimurid->update([
            'nik' => $request->nik,
            'agama' => $request->agama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pendidikan' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
            'kewarganeraan' => $request->kewarganeraan,
            'alamat' => $request->alamat,
            // 'avatar' => $request->file('avatar')->storeAs('avatar', $user->id . '_' . $request->file('avatar')->getClientOriginalName(), 'public')
        ]);
        if ($request->has('avatar')) {
            Storage::delete($user->avatar);
            $user->avatar = $request->file('avatar')->storeAs('avatar/user', $user->id . '_' . $user->slug, 'public');
            $user->save();
        }
        flash()->success('Wali Murid Berhasil Diubah');
        return redirect()->route('walimurid.show', $walimurid->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        try {
            // Cari data WaliKelas berdasarkan slug
            $walimurid = WaliMurid::where('slug', $slug)->firstOrFail();
            $user = User::where('id', $walimurid->user_id)->firstOrFail();
            // Periksa apakah avatar ada dan hapus jika ada
            if ($user->avatar && Storage::exists($user->avatar)) {
                Storage::delete($user->avatar);
            }

            // Hapus data WaliKelas dari database
            $walimurid->delete();
            $user->delete();
            return response()->json(['success' => 'Item deleted successfully']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Item not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'There was an error deleting the item'], 500);
        }
    }
}

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
        $provinces = Province::get();
        $cities = City::get();
        $districs = District::get();
        $villages = Village::get();
        return view('administrator.WaliMurid.create', [
            'provinces' => $provinces,
            'cities' => $cities,
            'districs' => $districs,
            'villages' => $villages
        ]);
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
            'pendapatan' => ['nullable', 'string'],
            'kewarganeraan' => ['required', 'string'],
            'province_code' => ['required', 'integer'],
            'city_code' => ['required', 'integer'],
            'district_code' => ['required', 'integer'],
            'village_code' => ['required', 'integer'],
            'alamat' => ['required', 'string'],
            'avatar' => ['required', 'mimes:jpeg,jpg,png,gif'] // Ubah validasi menjadi 'image'
        ]);

        $user = User::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => Hash::make(Str::slug($validateData['name'])),
        ]);

        $waliMurid = WaliMurid::create([
            'user_id' => $user->id,
            'nik' => $validateData['nik'],
            'agama' => $validateData['agama'],
            'tempat_lahir' => $validateData['tempat_lahir'],
            'tanggal_lahir' => $validateData['tanggal_lahir'],
            'pendidikan' => $validateData['pendidikan'],
            'pekerjaan' => $validateData['pekerjaan'],
            'pendapatan' => $validateData['pendapatan'],
            'kewarganeraan' => $validateData['kewarganeraan'],
            'province_code' => $validateData['province_code'],
            'city_code' => $validateData['city_code'],
            'district_code' => $validateData['district_code'],
            'village_code' => $validateData['village_code'],
            'alamat' => $validateData['alamat'], 'avatar' => $request->file('avatar')->storeAs('avatar', $user->id . '_' . $request->file('avatar')->getClientOriginalName(), 'public')
        ]);

        flash()->success('Wali Murid Berhasil Ditambahkan');
        return redirect()->route('walimurid.index');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

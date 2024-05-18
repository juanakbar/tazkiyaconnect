<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = [];
    // Relasi many-to-one dengan model WaliMurid

    // Relasi many-to-one dengan model WaliMurid
    public function waliMurid()
    {
        return $this->belongsTo(WaliMurid::class);
    }

    // Relasi many-to-one dengan model WaliKelas
    public function waliKelas()
    {
        return $this->belongsTo(WaliKelas::class);
    }
    // Relasi one-to-many dengan model KegiatanMurid
    public function kegiatanMurids()
    {
        return $this->hasMany(KegiatanMurid::class);
    }

    // Relasi many-to-many melalui KegiatanMurid untuk mendapatkan kegiatan yang diikuti oleh murid
    public function kegiatans()
    {
        return $this->belongsToMany(Kegiatan::class, 'kegiatan_murids');
    }

    // Relasi one-to-many dengan model PrestasiMurid
    public function prestasiMurids()
    {
        return $this->hasMany(PrestasiMurid::class);
    }

    // Relasi many-to-many melalui PrestasiMurid untuk mendapatkan prestasi yang dimiliki oleh murid
    public function prestasis()
    {
        return $this->belongsToMany(Prestasi::class, 'prestasi_murids');
    }

    // Relasi one-to-many dengan model KelasMurid
    public function kelasMurids()
    {
        return $this->hasMany(KelasMurid::class);
    }

    // Relasi many-to-many melalui KelasMurid untuk mendapatkan kelas yang diikuti oleh murid
    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'kelas_murids');
    }
}

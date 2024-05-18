<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = [];

    // Relasi many-to-many dengan model Murid
    public function murids()
    {
        return $this->belongsToMany(Murid::class, 'kelas_murids');
    }
}
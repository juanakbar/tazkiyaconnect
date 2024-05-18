<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = [];

    public function murids()
    {
        return $this->belongsToMany(Murid::class, 'prestasi_murids');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanMurid extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = [];

    // Relasi many-to-one dengan model Murid
    public function murid()
    {
        return $this->belongsTo(Murid::class);
    }

    // Relasi many-to-one dengan model Kegiatan
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}

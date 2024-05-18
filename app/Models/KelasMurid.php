<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasMurid extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = [];
    // Relasi many-to-one dengan model Murid
    public function murid()
    {
        return $this->belongsTo(Murid::class);
    }

    // Relasi many-to-one dengan model Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Penilaian extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = [];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}

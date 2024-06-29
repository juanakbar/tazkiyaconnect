<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Siswa extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    public function waliMurid(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'penilaians', 'siswa_id', 'task_id')
            ->using(Penilaian::class)
            ->withTimestamps();
    }
}

<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Uuid\Uuid;

class Kelas extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    protected static function booted()
    {
        static::creating(function ($kelas) {
            $kelas->slug = Str::slug(Uuid::uuid4() . '_' . $kelas->id);
        });
    }

    public function waliKelas(): BelongsTo
    {
        return $this->belongsTo(WaliKelas::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function siswas(): HasMany
    {
        return $this->hasMany(Siswa::class);
    }
}

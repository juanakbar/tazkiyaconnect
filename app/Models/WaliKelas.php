<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WaliKelas extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];
    protected static function booted()
    {
        static::creating(function ($walikelas) {
            $walikelas->slug = Str::slug($walikelas->user->name . '_' . $walikelas->id);
        });
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

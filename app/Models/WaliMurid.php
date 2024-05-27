<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WaliMurid extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];
    protected static function booted()
    {
        static::creating(function ($walimurid) {
            $walimurid->slug = Str::slug($walimurid->user->name . '_' . $walimurid->id);
        });
    }
    // WaliMurid to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

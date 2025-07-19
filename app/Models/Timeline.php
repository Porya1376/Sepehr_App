<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Timeline extends Model
{
    protected $fillable = [
        'user_id',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function hashtags(): HasMany
    {
        return $this->hasMany(Hashtag::class);
    }
    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }
    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }
}

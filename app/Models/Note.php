<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    protected $fillable = [
        'timeline_id',
        'content',
    ];
    public function timeline(): BelongsTo
    {
        return $this->belongsTo(Timeline::class);
    }
}

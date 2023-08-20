<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Diagnostic extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'dis_id',
        'image',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function diseases(): BelongsTo
    {
        return $this->belongsTo(Disease::class, 'dis_id', 'id');
    }
}

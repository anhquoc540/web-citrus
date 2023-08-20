<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'therapy_id',
        'name',
        'instruction',
        'uses',
        'manufacturer',
        'reg_number',
        'status',
        'photo',
    ];

    public function therapy(): BelongsTo
    {
        return $this->belongsTo(Therapy::class, 'therapy_id', 'id');
    }
}

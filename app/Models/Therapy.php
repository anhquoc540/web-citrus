<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Therapy extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'dis_id',
        'name',
        'description',
        'is_chemical',
    ];

    public function disease(): BelongsTo
    {
        // return $this->belongsTo(Disease::class);
        return $this->belongsTo(Disease::class, 'dis_id', 'id');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'therapy_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Price extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_id', 
        'product_id', 
        'price', 
        'qty', 
        'status',
        'date_of_manufacture',
        'date_of_expiry',
    ];

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}

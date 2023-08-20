<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'order_code',
        'user_id',
        'store_id',
        'address_id',
        'status',
        'description',
        'shipping_fee',
        'total',
        'paid',
        'payment',
    ];

    public function address(): HasOne
    {
        return $this->hasOne(Address::class, 'id', 'address_id');
    }

    public function store(): HasOne
    {
        return $this->hasOne(Store::class, 'id', 'store_id');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function detail()
    {
        return $this->hasMany(Detail::class, 'order_id');
    }
}

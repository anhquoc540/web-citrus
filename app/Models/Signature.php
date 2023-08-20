<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_type',
        'amount',
        'order_info',
        'response_code',
        'transaction_no',
        'bank_code',
        'pay_date',
        'status',
    ];
}

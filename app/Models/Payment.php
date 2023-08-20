<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'command',
        'curr_code',
        'ip_addr',
        'locale',
        'order_info',
        'order_type',
        'order_code',
        'bank_code',
        'create_date',
        'expire_date',
    ];

}

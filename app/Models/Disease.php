<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disease extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'characteristic',
        'reason',
        'photo',
    ];

    public function therapy()
    {
        return $this->hasMany(Therapy::class, 'dis_id');
    }
}

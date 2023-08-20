<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notification;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'address_id',
        'status', // 0 = inactive, 1 = active, 2 = closed
        'lg_mobile', // 1 is loging mobile, 2 is web admin
        'role_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $attributes = [
        'fullname' => null,
        'cccdmt' => null,
        'cccdms' => null,
        'avatar' => null,
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function routeNotificationForVonage(Notification $notification): string
    {
        return $this->phone;
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function address()
    {
        return $this->hasMany(Address::class);
    }

    public function store(): HasOne
    {
        return $this->hasOne(Store::class);
    }

    public function detailAddress(): HasOne
    {
        return $this->hasOne(Address::class, 'id', 'address_id');
    }
}

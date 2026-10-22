<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'userid';
    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
        'phone',
        'email',
        'user_type'
    ];

    protected $hidden = [
        'password'
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class, 'userid', 'userid');
    }
}
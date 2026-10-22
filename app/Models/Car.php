<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    protected $table = 'cars';
    protected $primaryKey = 'carid';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'image',
        'price',
        'description',
        'make',
        'model',
        'year',
        'fuel_type',
        'seats',
        'transmission',
        'air_conditioning',
        'availability'
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class, 'carid', 'carid');
    }

    public function features(): HasMany
    {
        return $this->hasMany(Feature::class, 'carid', 'carid');
    }
}

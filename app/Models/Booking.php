<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'bookingid';
    public $timestamps = false;

    protected $fillable = [
        'userid',
        'carid',
        'startdate',
        'enddate',
        'totalcost'
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class, 'carid', 'carid');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userid', 'userid');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Feature extends Model
{
    protected $table = 'features';
    protected $primaryKey = 'featureid';
    public $timestamps = false;

    protected $fillable = [
        'carid',
        'feature'
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class, 'carid', 'carid');
    }
}

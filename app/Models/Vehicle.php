<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_code',
        'brand',
        'model',
        'ownership',
    ];

    public function rented(): HasOne
    {
        return $this->hasOne(RentedVehicle::class);
    }
}

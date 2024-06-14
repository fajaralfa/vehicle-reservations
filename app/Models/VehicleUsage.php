<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleUsage extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_reservation_id',
        'distance',
        'fuel_usage',
        'start_date',
        'end_date',
    ];
}

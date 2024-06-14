<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentedVehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'start_date',
        'end_date',
    ];
}

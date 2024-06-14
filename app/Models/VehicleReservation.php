<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleReservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'admin_id',
        'approver_id',
        'orderer_id',
        'vehicle_id',
        'is_approved',
        'approved_date',
    ];
}

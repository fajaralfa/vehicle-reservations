<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function vehicleDriver(): BelongsTo
    {
        return $this->belongsTo(VehicleDriver::class);
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'approver_id');
    }
    public function orderer(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'orderer_id');
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }
}

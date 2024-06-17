<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Employee;
use App\Models\Vehicle;
use App\Models\VehicleDriver;
use App\Models\VehicleReservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $driver = VehicleDriver::where('name', 'Michael')->first();
        $admin = Admin::where('username', 'admin')->first();
        $approver = Employee::where('username', 'fajar')->first();
        $orderer = Employee::where('username', 'alfarizi')->first();
        $vehicle = Vehicle::where('item_code', 'TY21CL')->first();

        VehicleReservation::create([
            'vehicle_driver_id' => $driver->id,
            'admin_id' => $admin->id,
            'approver_id' => $approver->id,
            'orderer_id' => $orderer->id,
            'vehicle_id' => $vehicle->id,
            'is_approved' => null,
            'approved_date' => null,
        ]);
    }
}

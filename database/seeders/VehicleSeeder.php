<?php

namespace Database\Seeders;

use App\Models\RentedVehicle;
use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehicle::create([
            'item_code' => 'TY21CL',
            'brand' => 'Toyota',
            'model' => 'Corolla 2021',
            'ownership' => 'owned',
        ]);
        Vehicle::create([
            'item_code' => 'TS00MS',
            'brand' => 'Tesla',
            'model' => 'Model S',
            'ownership' => 'rented',
        ]);

        $toyota = Vehicle::where('item_code', 'TY21CL')->first();
        $tesla = Vehicle::where('item_code', 'TS00MS')->first();

        RentedVehicle::create([
            'vehicle_id' => $toyota->id,
            'start_date' => now()->subDays(3),
            'end_date' => now()->subDays(2),
        ]);
        RentedVehicle::create([
            'vehicle_id' => $tesla->id,
            'start_date' => now()->subDays(2),
            'end_date' => now(),
        ]);
    }
}

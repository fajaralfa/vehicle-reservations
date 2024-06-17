<?php

namespace Database\Seeders;

use App\Models\VehicleDriver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleDriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VehicleDriver::create([
            'name' => 'Michael',
        ]);
        VehicleDriver::create([
            'name' => 'John Doe',
        ]);
    }
}

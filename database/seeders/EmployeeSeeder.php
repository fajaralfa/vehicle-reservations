<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'name' => 'Fajar',
            'level' => 'lower_management',
            'username' => 'fajar',
            'password' => 'rahasia',
        ]);
        Employee::create([
            'name' => 'Ilham',
            'level' => 'intermediate',
            'username' => 'ilham',
            'password' => 'rahasia',
        ]);
        Employee::create([
            'name' => 'Alfarizi',
            'level' => 'entry',
            'username' => 'alfarizi',
            'password' => 'rahasia',
        ]);
    }
}

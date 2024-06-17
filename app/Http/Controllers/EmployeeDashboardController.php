<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeDashboardController extends Controller
{
    public function __invoke()
    {
        return view('employee.dashboard');
    }
}

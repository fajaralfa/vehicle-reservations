<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ApproveVehicleReservation;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeAuthController;
use App\Http\Controllers\EmployeeDashboardController;
use App\Http\Controllers\RequestVehicleReservation;
use App\Http\Controllers\VehicleDriverResourceController;
use App\Http\Controllers\ProcessVehicleReservationController;
use App\Http\Controllers\VehicleResourceController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Route::view('/login', 'login')->name('login');

Route::prefix('admin')->group(function () {
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/', DashboardController::class);
        Route::post('/logout', [AdminAuthController::class, 'logout']);

        Route::get('/vehicle-reservations', [ProcessVehicleReservationController::class, 'index']);
        Route::get('/vehicle-reservations/{id}', [ProcessVehicleReservationController::class, 'show']);
        Route::get('/vehicle-reservations/{id}/process', [ProcessVehicleReservationController::class, 'processPage']);
        Route::post('/vehicle-reservations/{id}/process', [ProcessVehicleReservationController::class, 'process']);

        Route::resource('vehicles', VehicleResourceController::class);
        Route::resource('vehicle-drivers', VehicleDriverResourceController::class);
    });
});

Route::prefix('employee')->group(function () {
    Route::post('/login', [EmployeeAuthController::class, 'login']);
    Route::post('/logout', [EmployeeAuthController::class, 'logout']);
    Route::middleware(['auth:employee'])->group(function () {
        Route::get('/', EmployeeDashboardController::class);
        Route::resource('vehicle-reservations', RequestVehicleReservation::class)
            ->only('index', 'show', 'create', 'store', 'destroy');
        Route::get('vehicle-approval', [ApproveVehicleReservation::class, 'index']);
        Route::get('vehicle-approval/{id}', [ApproveVehicleReservation::class, 'show']);
        Route::post('vehicle-approval/{id}/approve', [ApproveVehicleReservation::class, 'approve']);
    });
});

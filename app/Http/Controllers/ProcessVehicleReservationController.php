<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\VehicleDriver;
use App\Models\VehicleReservation;
use Illuminate\Http\Request;

class ProcessVehicleReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicleReservations = VehicleReservation::all();

        return view('admin.vehicle-reservation.index', [
            'vehicleReservations' => $vehicleReservations,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vehicleReservation = VehicleReservation::find($id);

        return view('admin.vehicle-reservation.show', [
            'vehicleReservation' => $vehicleReservation,
        ]);
    }

    public function processPage(string $id)
    {
        $level = [
            'entry' => 1,
            'intermediate' => 2,
            'lower_management' => 3,
            'higher_management' => 4,
            'executive' => 5,
        ];

        $vehicleReservation = VehicleReservation::find($id);
        $ordererLevelNum = $level[$vehicleReservation->orderer->level];
        $vehicleDrivers = VehicleDriver::all();
        $approvers = Employee::where('level', '>=', ($ordererLevelNum + 2))->get();

        return view('admin.vehicle-reservation.process', [
            'vehicleReservation' => $vehicleReservation,
            'vehicleDrivers' => $vehicleDrivers,
            'approvers' => $approvers,
        ]);
    }

    public function process(Request $request, string $id)
    {
        $payload = request()->validate(['vehicle_driver_id' => 'numeric', 'approver_id' => 'numeric']);

        $vehicleReservation = VehicleReservation::find($id);
        $vehicleReservation->vehicle_driver_id = $payload['vehicle_driver_id'];
        $vehicleReservation->approver_id = $payload['approver_id'];
        $vehicleReservation->admin_id = auth('admin')->user()->id;
        $vehicleReservation->save();

        return redirect("/admin/vehicle-reservations/$id/process");
    }
}

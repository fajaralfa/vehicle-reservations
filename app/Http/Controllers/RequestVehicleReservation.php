<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleReservation;
use Illuminate\Http\Request;

class RequestVehicleReservation extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicleReservations = VehicleReservation::
            where('orderer_id', auth('employee')->user()->id)
            ->orderBy('is_approved')
            ->get();

        return view('employee.vehicle-reservation.index', [
            'vehicleReservations' => $vehicleReservations,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicle = Vehicle::all();

        return view('employee.vehicle-reservation.request', [
            'vehicles' => $vehicle,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'vehicle_id' => 'required',
        ]);

        $vehicleReservation = new VehicleReservation([
            'vehicle_id' => request('vehicle_id'),
            'orderer_id' => auth('employee')->user()->id,
        ]);

        $vehicleReservation->save();

        return redirect('/employee/vehicle-reservations');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vehicleReservation = VehicleReservation::where('id', $id)
            ->where('orderer_id', auth('employee')->user()->id)->first();

        return view('employee.vehicle-reservation.show', [
            'vehicleReservation' => $vehicleReservation,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

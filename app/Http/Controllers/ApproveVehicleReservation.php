<?php

namespace App\Http\Controllers;

use App\Models\VehicleReservation;
use Illuminate\Http\Request;

class ApproveVehicleReservation extends Controller
{
    public function index()
    {
        $vehicle_approvals = VehicleReservation::
            where('approver_id', auth('employee')->user()->id)
            ->latest()
            ->orderBy('is_approved')
            ->get();

        return view('employee.vehicle-approval.index', [
            'vehicle_approvals' => $vehicle_approvals,
        ]);
    }

    public function show(string $id)
    {
        $vehicleReservation = VehicleReservation::
            where('approver_id', auth('employee')->user()->id)
            ->where('id', $id)
            ->first();

        return view('employee.vehicle-approval.show-approval', [
            'vehicleReservation' => $vehicleReservation,
        ]);
    }

    public function approve(string $id)
    {
        $answer = request()->post('answer');

        $vehicleReservation = VehicleReservation::
            where('approver_id', auth('employee')->user()->id)
            ->where('id', $id)
            ->first();

        $vehicleReservation->is_approved = $answer;
        $vehicleReservation->approved_date = now();
        $vehicleReservation->save();

        return redirect("/employee/vehicle-approval/$id");
    }
}

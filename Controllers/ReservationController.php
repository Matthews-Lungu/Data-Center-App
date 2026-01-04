<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'resource_id' => 'required|exists:resources,id',
            'start_time'  => 'required|date',
            'end_time'    => 'required|date|after:start_time',
        ]);

        $reservation = Reservation::create([
            'resource_id' => $validated['resource_id'],
            'start_time'  => $validated['start_time'],
            'end_time'    => $validated['end_time'],
            'status'      => 'pending',
            'user_id'     => 1,
        ]);

        return response()->json([
            'message' => 'Reservation created successfully',
            'reservation' => $reservation
        ], 201);
    }

    public function approve($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['status' => 'approved']);

        return response()->json([
            'message' => 'Reservation approved',
            'reservation' => $reservation
        ]);
    }
}

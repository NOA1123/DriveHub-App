<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use App\Models\Car;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        return BookingResource::collection(
            Booking::with(['car', 'user'])->get()
        );
    }

    public function show($id)
    {
        $booking = Booking::with(['car', 'user'])->find($id);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        return new BookingResource($booking);
    }

 public function store(Request $request)
{
    $validated = $request->validate([
        'userid' => 'required|exists:users,userid',
        'carid' => 'required|exists:cars,carid',
        'startdate' => 'required|date',
        'enddate' => 'required|date|after:startdate',
    ]);

    $car = Car::find($validated['carid']);

    if (!$car) {
        return response()->json(['message' => 'Car not found'], 404);
    }

    if ($car->availability === 'False') {
        return response()->json(['message' => 'Car not available'], 400);
    }

    //  Calculate number of days
    $start = \Carbon\Carbon::parse($validated['startdate']);
    $end = \Carbon\Carbon::parse($validated['enddate']);

    $days = $days = max(1, $start->diffInDays($end));

    //  Calculate total cost
    $totalcost = $car->price * $days;

    // Add totalcost to validated data
    $validated['totalcost'] = $totalcost;

    // Create booking
    $booking = Booking::create($validated);

    // Set car unavailable
    $car->availability = 'False';
    $car->save();

    return response()->json([
        'message' => 'Booking created successfully',
        'total_days' => $days,
        'data' => new BookingResource($booking->load(['car', 'user']))
    ], 201);
}
    public function update(Request $request, $id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $validated = $request->validate([
            'userid' => 'sometimes|required|exists:users,userid',
            'carid' => 'sometimes|required|exists:cars,carid',
            'startdate' => 'sometimes|required|date',
            'enddate' => 'sometimes|required|date|after:startdate',
            'totalcost' => 'sometimes|required|integer|min:0',
        ]);

        $booking->update($validated);

        return response()->json([
            'message' => 'Booking updated successfully',
            'data' => new BookingResource($booking->load(['car', 'user']))
        ]);
    }

    public function destroy($id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $car = Car::find($booking->carid);

        $booking->delete();

        if ($car) {
            $car->availability = 'True';
            $car->save();
        }

        return response()->json(['message' => 'Booking deleted successfully']);
    }
}

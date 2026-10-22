<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        return CarResource::collection(Car::all());
    }

    public function show($id)
    {
        $car = Car::find($id);

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        return new CarResource($car);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:200',
            'image' => 'required|string|max:200',
            'price' => 'required|integer|min:0',
            'description' => 'required|string',
            'make' => 'required|string|max:200',
            'model' => 'required|string|max:200',
            'year' => 'required|integer',
            'fuel_type' => 'required|string|max:200',
            'seats' => 'required|integer|min:1',
            'transmission' => 'required|string|max:200',
            'air_conditioning' => 'required|string|max:10',
            'availability' => 'required|string|max:10',
        ]);

        $car = Car::create($validated);

        return response()->json([
            'message' => 'Car created successfully',
            'data' => new CarResource($car)
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $car = Car::find($id);

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:200',
            'image' => 'sometimes|required|string|max:200',
            'price' => 'sometimes|required|integer|min:0',
            'description' => 'sometimes|required|string',
            'make' => 'sometimes|required|string|max:200',
            'model' => 'sometimes|required|string|max:200',
            'year' => 'sometimes|required|integer',
            'fuel_type' => 'sometimes|required|string|max:200',
            'seats' => 'sometimes|required|integer|min:1',
            'transmission' => 'sometimes|required|string|max:200',
            'air_conditioning' => 'sometimes|required|string|max:10',
            'availability' => 'sometimes|required|string|max:10',
        ]);

        $car->update($validated);

        return response()->json([
            'message' => 'Car updated successfully',
            'data' => new CarResource($car)
        ]);
    }

    public function destroy($id)
    {
        $car = Car::find($id);

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        $car->delete();

        return response()->json(['message' => 'Car deleted successfully']);
    }
}

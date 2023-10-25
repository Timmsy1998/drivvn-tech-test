<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Rules\ValidCarAge;

class CarController extends Controller
{
    /**
     * Add a new car.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'make' => 'required|string',
            'model' => 'required|string',
            'build_date' => ['required', 'date', new ValidCarAge],
            'colour_id' => 'required|integer',
        ]);

        // Create a new car
        $car = Car::create($validatedData);

        return response()->json(['message' => 'Car added successfully', 'car' => $car], 201, [], JSON_PRETTY_PRINT);
    }

    /**
     * Retrieve a specific car by ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $car = Car::find($id);

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        return response()->json(['car' => $car], 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Update a car by ID.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'make' => 'required|string',
            'model' => 'required|string',
            'build_date' => ['required', 'date', new ValidCarAge],
            'colour_id' => 'required|integer',
        ]);

        $car = Car::find($id);

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        $car->update($validatedData);

        return response()->json(['message' => 'Car updated successfully', 'car' => $car], 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Delete a car by ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $car = Car::find($id);

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        $car->delete();

        return response()->json(['message' => 'Car deleted successfully'], 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * List all cars.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $cars = Car::all();

        return response()->json(['cars' => $cars], 200, [], JSON_PRETTY_PRINT);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colour;

class ColourController extends Controller
{
    /**
     * Add a new Colour.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new Colour
        $colour = Colour::create($validatedData);

        return response()->json(['message' => 'Colour added successfully', 'colour' => $colour], 201);
    }

    /**
     * Retrieve a specific Colour by ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $colour = Colour::find($id);

        if (!$colour) {
            return response()->json(['message' => 'Colour not found'], 404);
        }

        return response()->json(['colour' => $colour], 200);
    }

    /**
     * Update a Colour by ID.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        $colour = Colour::find($id);

        if (!$colour) {
            return response()->json(['message' => 'Colour not found'], 404);
        }

        $colour->update($validatedData);

        return response()->json(['message' => 'Colour updated successfully', 'colour' => $colour], 200);
    }

    /**
     * Delete a Colour by ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $colour = Colour::find($id);

        if (!$colour) {
            return response()->json(['message' => 'Colour not found'], 404);
        }

        $colour->delete();

        return response()->json(['message' => 'Colour deleted successfully'], 200);
    }

    /**
     * List all Colours.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $colours = Colour::all();

        return response()->json(['colours' => $colours], 200);
    }
}

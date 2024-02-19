<?php

namespace App\Http\Controllers;

use App\Http\Requests\APICarsRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class APICarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        return response()->json([
            'status' => 'true',
            'cars' => $cars
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(APICarsRequest $request)
    {
        $car = Car::created($request->all());
        return response()->json([
            'status' => 'Coche insertado con exito',
            'car' => $car
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cars = Car::find($id);
        return response()->json([
            'status' => 'true',
            'cars' => $cars
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

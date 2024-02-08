<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('car.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        $request->validated();

        try {
            $newCar = new Car();
            $newCar->plate = $request->plate;
            $newCar->marca = $request->marca;
            $newCar->model = $request->model;
            $newCar->year = $request->year;
            $newCar->last_revision_date = $request->last_revision_date;
            $newCar->price = $request->price;
            $newCar->user_id = Auth::id();

            $nombreFoto = time() . "-" . $request->file('photo')->getClientOriginalName();
            $newCar->photo = $nombreFoto;

            $newCar->save();
        } catch (QueryException $e) {
            return 'alerta';
        }        

    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }
}

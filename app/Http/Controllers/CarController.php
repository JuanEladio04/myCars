<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        return view('car.index')->with('cars', $cars);
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
        try {
            $validatedData = $request->validated();
    
            $newCar = new Car();
            $newCar->plate = $validatedData['plate'];
            $newCar->marca = $validatedData['marca'];
            $newCar->model = $validatedData['model']; 
            $newCar->year = $validatedData['year'];
            $newCar->last_revision_date = $validatedData['last_revision_date'];
            $newCar->price = $validatedData['price'];
            $newCar->user_id = Auth::user()->id;
    
            if ($request->hasFile('photo')) { 
                $nombreFoto = time() . "-" . $request->file('photo')->getClientOriginalName();
                $newCar->photo = $nombreFoto;
    
                $request->file('photo')->storeAs('public/img_car', $nombreFoto);
            }
    
            $newCar->save();
    
            return redirect()->route('car.index')->with('status', 'Coche creado correctamente');
        } catch (QueryException $e) {
            return redirect()->route('car.index')->with('status', 'Error al crear el coche');
        }
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        $myCar = Car::find($car);
        return view('car.show')->with('car', $myCar);
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

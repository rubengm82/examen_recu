<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        $response = null;
        if ($cars->isEmpty()) {
            $response = response()->json(["message" => "No hay coches aun", "cars" => null], 404);
        } else {
            $response = response()->json(["message" => "Hay coches", "cars" => $cars], 200);
        }
        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validacion basica de lo que se recibe
        $validate = $request->validate([
            "name" => "required|string",
            "model" => "required|string",
            "price" => "required|numeric",
            "owner_id" => "nullable|exists:owners,id"
        ]);
        Car::create($validate);
        return response()->json(["message" => "Coche creado correctamente"], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::find($id);
        $response = null;

        if (!$car) {
            $response = response()->json(["message" => "Coche no encontrado", "car" => null], 404);
        } else {
            $response = response()->json(["message" => "Coche encontrado", "car" => $car], 200);
        }

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $car = Car::find($id);
        $response = null;

        if (!$car) {
            $response = response()->json(["message" => "Coche no encontrado"], 404);
        } else {
            $validate = $request->validate([
                "name" => "required|string",
                "model" => "required|string",
                "price" => "required|numeric",
                "owner_id" => "nullable|exists:owners,id"
            ]);

            $car->update($validate);
            $response = response()->json(["message" => "Coche actualizado correctamente", "car" => $car], 200);
        }

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::find($id);
        $response = null;

        if (!$car) {
            $response = response()->json(["message" => "Coche no encontrado"], 404);
        } else {
            $car->delete();
            $response = response()->json(["message" => "Coche eliminado correctamente"], 200);
        }

        return $response;
    }
}

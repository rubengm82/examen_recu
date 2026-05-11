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
        if ($cars->isEmpty()) {
            return response()->json(["message" => "No hay coches aun", "cars" => null], 404);
        } else {
            return response()->json(["message" => "Hay coches", "cars" =>$cars], 200);
        }
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
        //
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

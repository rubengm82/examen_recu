<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use Illuminate\Http\Request;

class BikeControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bikes = Bike::where("user_id", auth()->user()->id)->get();
        // $bikes = auth()->user()->bikes()->get();
    
        if ($bikes->isEmpty()) {
            $response = response()->json(["message" => "No hay aún items", "bikes" => null], 200);
        } else {
            $response = response()->json(["message" => "Hay items", "bikes" => $bikes], 200);
        }
        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            "marca" => "required|string",
            "modelo" => "required|string",
            "anyo" => "required|integer",
        ]);
        $validate["user_id"] = auth()->user()->id;

        Bike::create($validate);
        return response()->json(["message" => "Creado correctamente"], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bike = Bike::where("user_id", auth()->user()->id)->find($id);

        if (!$bike) {
            $response = response()->json(["message" => "No encontrado", "bike" => null], 404);
        } else {
            $response = response()->json(["message" => "Encontrado", "bike" => $bike], 200);
        }

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $bike = Bike::find($id);
        $bike = Bike::where("user_id", auth()->user()->id)->find($id);

        if (!$bike) {
            $response = response()->json(["message" => "No encontrada"], 404);
        } else {
            $validate = $request->validate([
                "marca" => "required|string",
                "modelo" => "required|string",
                "anyo" => "required|integer",
            ]);

            $bike->update($validate);
            $response = response()->json(["message" => "Actualizado correctamente", "bike" => $bike], 200);
        }

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // $project = Bike::find($id);
        $bike = Bike::where("user_id", auth()->user()->id)->find($id);

        if (!$bike) {
            $response = response()->json(["message" => "No encontrado"], 404);
        } else {
            $bike->delete();
            $response = response()->json(["message" => "Eliminado correctamente"], 200);
        }

        return $response;
    }
}

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
        $bikes = Bike::where("user_id", auth()->user()->id)->with("piezas")->get();
    
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
        // Validacion basica de lo que se recibe
        $validate = $request->validate([
            "marca" => "required|string",
            "modelo" => "required|string",
            "cilindrada" => "required|integer",
            "gasolina" => "required|boolean",
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
        // $project = Project::with("tasks")->find($id);
        $bike = Bike::where("user_id", auth()->user()->id)->with("piezas")->find($id);

        if (!$bike) {
            $response = response()->json(["message" => "No encontrado", "bike" => null], 200);
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
        // $project = Project::find($id);
        $bike = Bike::where("user_id", auth()->user()->id)->find($id);

        // marca, modelo, cilindrada, gasolina, user_id

        if (!$bike) {
            $response = response()->json(["message" => "No encontrado"], 404);
        } else {
            $validate = $request->validate([
                "marca" => "required|string",
                "modelo" => "required|string",
                "cilindrada" => "required|integer",
                "gasolina" => "required|boolean",
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
        // $project = Project::find($id);
        $project = Bike::where("user_id", auth()->user()->id)->find($id);

        if (!$project) {
            $response = response()->json(["message" => "No encontrado"], 200);
        } else {
            $project->delete();
            $response = response()->json(["message" => "Eliminado correctamente"], 200);
        }

        return $response;
    }
}

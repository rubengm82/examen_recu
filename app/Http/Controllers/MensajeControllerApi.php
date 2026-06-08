<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;

class MensajeControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mensajes = Mensaje::where("remitente_id", auth()->user()->id)->get();
        $mensajesdestinatarios = Mensaje::all();
    
        if ($mensajes->isEmpty()) {
            $response = response()->json(["message" => "No hay aún mensajes", "mensajes" => null, "mensajesdestinatarios" => null], 200);
        } else {
            $response = response()->json(["message" => "Hay mensajes", "mensajes" => $mensajes, "mensajesdestinatarios" => $mensajesdestinatarios], 200);
        }
        return $response;
    }

    /**
     * Display a listing of the resource de destinatarios
     */
    // public function index_destinatarios()
    // {
    //     $mensajes = Mensaje::all();
    
    //     if ($mensajes->isEmpty()) {
    //         $response = response()->json(["message" => "No hay aún mensajes", "mensajesdestinatarios" => null], 200);
    //     } else {
    //         $response = response()->json(["message" => "Hay mensajes", "mensajesdestinatarios" => $mensajes], 200);
    //     }
    //     return $response;
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validacion basica de lo que se recibe
        $validate = $request->validate([
            "destinatario_id" => "required",
            "asunto" => "required|string",
            "mensaje" => "required|string",
            "leido" => "required|boolean",
        ]);
        $validate["remitente_id"] = auth()->user()->id;
        
        Mensaje::create($validate);
        return response()->json(["message" => "Creado correctamente"], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mensaje = Mensaje::where("remitente_id", auth()->user()->id)->find($id);

        if (!$mensaje) {
            $response = response()->json(["message" => "No encontrado", "mensaje" => null], 200);
        } else {
            $response = response()->json(["message" => "Encontrado", "mensaje" => $mensaje], 200);
        }

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $project = Project::find($id);
        // $project = Project::where("user_id", auth()->user()->id)->find($id);
        
        // // $response = null;

        // if (!$project) {
        //     $response = response()->json(["message" => "No encontrado"], 200);
        // } else {
        //     $validate = $request->validate([
        //         "nombre" => "required|string",
        //         "descripcion" => "required|string",
        //         "fecha_inicio" => "required|date",
        //         "fecha_fin" => "required|date",
        //     ]);

        //     $project->update($validate);
        //     $response = response()->json(["message" => "Actualizado correctamente", "project" => $project], 200);
        // }

        // return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $project = Project::find($id);
        // $project = Project::where("user_id", auth()->user()->id)->find($id);
        
        // // $response = null;

        // if (!$project) {
        //     $response = response()->json(["message" => "No encontrado"], 200);
        // } else {
        //     $project->delete();
        //     $response = response()->json(["message" => "Eliminado correctamente"], 200);
        // }

        // return $response;
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::where("user_id", auth()->user()->id)->with("tasks")->get();
        
        // $user = auth()->user();
        // $projects2 = $user->projects()->with('tasks')->get();
        // Log::info($projects2);
        // Log::info($projects2->toArray());

        $response = null;

        if ($projects->isEmpty()) {
            $response = response()->json(["message" => "No hay proyectos aun", "projects" => null], 404);
        } else {
            $response = response()->json(["message" => "Hay proyectos", "projects" => $projects], 200);
            //$response = response()->json(["message" => "Hay proyectos", "projects" => $projects, "projects2" => $projects2], 200);
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
            "nombre" => "required|string",
            "descripcion" => "required|string",
            "fecha_inicio" => "required|date",
            "fecha_fin" => "required|date",
        ]);
        $validate["user_id"] = auth()->user()->id;
        Project::create($validate);
        return response()->json(["message" => "Proyecto creado correctamente"], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::with("tasks")->find($id);

        $response = null;

        if (!$project) {
            $response = response()->json(["message" => "Proyecto no encontrado", "project" => null], 404);
        } else {
            $response = response()->json(["message" => "Proyecto encontrado", "project" => $project], 200);
        }

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::find($id);
        $response = null;

        if (!$project) {
            $response = response()->json(["message" => "Proyecto no encontrado"], 404);
        } else {
            $validate = $request->validate([
                "nombre" => "required|string",
                "descripcion" => "required|string",
                "fecha_inicio" => "required|date",
                "fecha_fin" => "required|date",
            ]);

            $project->update($validate);
            $response = response()->json(["message" => "Proyecto actualizado correctamente", "project" => $project], 200);
        }

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);
        $response = null;

        if (!$project) {
            $response = response()->json(["message" => "Proyecto no encontrado"], 404);
        } else {
            $project->delete();
            $response = response()->json(["message" => "Proyecto eliminado correctamente"], 200);
        }

        return $response;
    }
}

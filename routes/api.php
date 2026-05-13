<?php

use App\Http\Controllers\Api\CarsController;
use App\Http\Controllers\Api\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return response()->json(['message' => 'API funcionando sin Sanctum']);
});

// GET        /api/cars           --> api.cars.index
// POST       /api/cars           --> api.cars.store
// GET        /api/cars/{car}     --> api.cars.show
// PUT/PATCH  /api/cars/{car}     --> api.cars.update
// DELETE     /api/cars/{car}     --> api.cars.destroy
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('cars', CarsController::class)->names('api.cars');

    Route::apiResource('projects', ProjectController::class)->names('api.projects');
});

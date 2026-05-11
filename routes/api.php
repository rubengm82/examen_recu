<?php

use App\Http\Controllers\Api\CarsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return response()->json(['message' => 'API funcionando sin Sanctum']);
});

// Car
Route::apiResource("cars", CarsController::class)->names("api.cars");

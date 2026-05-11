<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\OwnersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('cars', CarsController::class);
Route::resource("owners", OwnersController::class);

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\OwnersController;
use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::view("/", "dashboard")->name("dashboard");
    Route::view("/owners", "owner.index")->name("owners");
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // Route::resource('cars', CarsController::class);
    // Route::resource('owners', OwnersController::class);
    Route::resource('projects', ProjectsController::class);
});

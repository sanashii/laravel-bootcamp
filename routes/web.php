<?php

use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;

Route::get("/", [ChirpController::class, 'index']);

Route::post('/chirps', [ChirpController::class, 'store']); // storing a new chirp

Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit']); // editing an existing chirp

Route::put('/chirps/{chirp}', [ChirpController::class, 'update']); // updating an existing chirp

Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy']); // deleting an existing chirp

// Route::resource('/chirps', ChirpController::class)
// ->only('store', 'edit', 'update', 'destroy');
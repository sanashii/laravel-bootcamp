<?php

use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Logout;

Route::get("/", [ChirpController::class, 'index']);

Route::middleware('auth')->group(function () {
    // Protected routes for authenticated users
    Route::post('/chirps', [ChirpController::class, 'store']); // storing a new chirp
    Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit']); // editing an existing chirp
    Route::put('/chirps/{chirp}', [ChirpController::class, 'update']); // updating an existing chirp
    Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy']); // deleting an existing chirp
});


// Route::resource('/chirps', ChirpController::class)
// ->only('store', 'edit', 'update', 'destroy');

// Register routes
Route::view('/register', 'auth.register')
    ->middleware('guest')
    ->name('register'); // Only guests can access the registration form

Route::post('/register', Register::class)
    ->middleware('guest'); // Only guests can submit the registration form  

// Logout route
Route::post('/logout', Logout::class)
    ->middleware('auth'); // Only authenticated users can log out

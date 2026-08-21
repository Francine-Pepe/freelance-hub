<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientController;

/* backend endpoints - routes */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return "Welcome to my freelance dashboard!";
});

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/clients', [ClientController::class, 'index']);

Route::get('/clients/create', [ClientController::class, 'create']);

Route::post('/clients', [ClientController::class, 'store']);

Route::get('/clients/{client}/edit', [ClientController::class, 'edit']);

Route::put('/clients/{client}', [ClientController::class, 'update']);

Route::delete('/clients/{client}', [ClientController::class, 'destroy']);

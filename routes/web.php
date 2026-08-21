<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

/* backend endpoints - routes
Route::resource => englobes all the routes (client resource) for a resource controller, in this case ClientController
*/

Route::resource('clients', ClientController::class);

/*
CLIENT RESOURCE

index   → /clients
create  → /clients/create
store   → POST /clients
show    → /clients/{client}
edit    → /clients/{client}/edit
update  → PUT /clients/{client}
destroy → DELETE /clients/{client}
*/

/* Route::get('/', function () {
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

Route::delete('/clients/{client}', [ClientController::class, 'destroy']); */

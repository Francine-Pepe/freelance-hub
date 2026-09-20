<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReminderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');


// Public pages
Route::get('/clients', [ClientController::class, 'index'])
    ->name('clients.index');

Route::get('/projects', [ProjectController::class, 'index'])
    ->name('projects.index');


// Protected pages
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('clients', ClientController::class)
        ->except(['index']);

    Route::resource('projects', ProjectController::class)
        ->except(['index']);

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::post('/reminders', [ReminderController::class, 'store'])
        ->name('reminders.store');

    Route::delete('/reminders/{reminder}', [ReminderController::class, 'destroy'])
        ->name('reminders.destroy');
});

require __DIR__.'/auth.php';

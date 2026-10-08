<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReminderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/debug-users', function () {
    return response()->json([
        'database' => DB::connection()->getDatabaseName(),
        'user_count' => \App\Models\User::count(),
        'users' => \App\Models\User::select('id', 'name', 'email')->get(),
    ]);
});

// Public pages
Route::get('/clients', [ClientController::class, 'index'])
    ->name('clients.index');

Route::get('/projects', [ProjectController::class, 'index'])
    ->name('projects.index');

Route::get('/how-it-works', function () {
    return view('how-it-works');
})->name('how-it-works');


// Protected pages
Route::middleware(['auth', 'verified'])->group(function () {

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

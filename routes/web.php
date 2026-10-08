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

Route::get('/debug-mail', function () {

    return response()->json([

        'app_env' => config('app.env'),

        'app_url' => config('app.url'),

        'mail_mailer' => config('mail.default'),

        'mail_host' => config('mail.mailers.smtp.host'),

        'mail_port' => config('mail.mailers.smtp.port'),

        'mail_encryption' => config('mail.mailers.smtp.scheme'),

        'mail_from_address' => config('mail.from.address'),

        'mail_from_name' => config('mail.from.name'),

    ]);

})->middleware('auth');

Route::get('/debug-route', function () {
    return 'DEBUG ROUTE WORKS';
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

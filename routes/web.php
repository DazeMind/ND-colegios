<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\InstitutionController;
use App\Http\Controllers\Web\SchoolController;
use App\Http\Controllers\Web\UserController;
use App\Http\Middleware\LogDebugMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => false,
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/register', function () {
    return redirect('/login');
});

Route::get('/dashboard', [InstitutionController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::resource('institution', InstitutionController::class)->middleware(['store' => LogDebugMiddleware::class,'update' => LogDebugMiddleware::class,'destroy' => LogDebugMiddleware::class,]);

    Route::resource('schools', SchoolController::class)->middleware(['store' => LogDebugMiddleware::class,'update' => LogDebugMiddleware::class,'destroy' => LogDebugMiddleware::class,]);

    Route::resource('user', UserController::class)->middleware(['store' => LogDebugMiddleware::class,'update' => LogDebugMiddleware::class,'destroy' => LogDebugMiddleware::class,]);
});

require __DIR__.'/auth.php';

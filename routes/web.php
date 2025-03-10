<?php

use App\Http\Controllers\Post\CreateControler;
use App\Http\Controllers\Profile\ShowController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//Profiles
Route::middleware('auth')->prefix('profile')->as('profile.')->group(function () {
    Route::get('/{user?}', [ShowController::class, 'show'])->name('show');
});

Route::middleware('auth')->prefix('posts')->as('posts.')->group(function () {
    Route::get('/create', [CreateControler::class, 'create'])->name('create');
    Route::post('/', [CreateControler::class, 'store'])->name('store');
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';

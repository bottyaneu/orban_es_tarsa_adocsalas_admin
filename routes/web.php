<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashController::class, 'index'])->name('dashboard');

    Route::get('/works', [\App\Http\Controllers\JobController::class, 'index'])->name('works.index');
    Route::put('/works/{id}', [\App\Http\Controllers\JobController::class, 'finish'])->name('works.finish');
    Route::post('/works', [\App\Http\Controllers\JobController::class, 'create'])->name('works.create');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/location', [\App\Http\Controllers\LocationController::class, 'index'])->name('location.index');
    Route::post('/location', [\App\Http\Controllers\LocationController::class, 'create'])->name('location.create');
    Route::delete('/location/{id}', [\App\Http\Controllers\LocationController::class, 'destroy'])->name('location.delete');

    Route::get('/spending', [\App\Http\Controllers\SpendingController::class, 'index'])->name('spending.index');
    Route::post('/spending', [\App\Http\Controllers\SpendingController::class, 'create'])->name('spending.create');
    Route::delete('/spending/{id}', [\App\Http\Controllers\SpendingController::class, 'destroy'])->name('spending.delete');
});

require __DIR__.'/auth.php';

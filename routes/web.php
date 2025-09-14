<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


Route::middleware(['auth', 'verified'])->group(function () {
    
    // Arahkan route 'dashboard' utama ke fungsi 'index' di TaskController
    Route::get('/dashboard', [TaskController::class, 'index'])->name('dashboard');

    // 3. Route untuk Create, Update, Delete Tasks
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::patch('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update'); // (Untuk update status/konten)
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy'); // (Untuk hapus task)

    // Route Profile bawaan Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

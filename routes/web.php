<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;


    Route::get('/', function () {
        return redirect(route("register"));
    });

Route::middleware('auth')->group(function () {

    Route::post('/chat/add', [ChatController::class, 'add'])->name('chat.add');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/dashboard', [ChatController::class, 'get'])->name('dashboard');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

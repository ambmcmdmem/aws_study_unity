<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function() {

    Route::put('/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('users.profile.update');
    Route::delete('/{user}/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.profile.destroy');
    
    Route::middleware('role:Admin')->group(function() {
        Route::get('', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    });

    Route::middleware('can:view,user')->group(function() {
        Route::get('/{user}/profile', [App\Http\Controllers\UserController::class, 'show'])->name('users.profile.show');
    });

});


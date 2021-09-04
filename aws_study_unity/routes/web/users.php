<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware('auth')->group(function() {

    Route::put('/{user}/update', [UserController::class, 'update'])->name('users.profile.update');
    Route::delete('/{user}/destroy', [UserController::class, 'destroy'])->name('users.profile.destroy');
    
    Route::middleware('role:Admin')->group(function() {
        Route::get('', [UserController::class, 'index'])->name('users.index');
        Route::put('{user}/attach', [UserController::class, 'attach'])->name('users.role.attach');
        Route::put('{user}/detach', [UserController::class, 'detach'])->name('users.role.detach');
    });


    Route::middleware('can:view,user')->group(function() {
        Route::get('/{user}/profile', [UserController::class, 'show'])->name('users.profile.show');
    });

});


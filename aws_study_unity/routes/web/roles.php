<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

Route::get('', [RoleController::class, 'index'])->name('roles.index');
Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::post('', [RoleController::class, 'store'])->name('roles.store');
Route::delete('/{role}/destroy', [RoleController::class, 'destroy'])->name('roles.destroy');
Route::put('/{role}/update', [RoleController::class, 'update'])->name('roles.update');
Route::put('/{role}/attach', [RoleController::class, 'attach'])->name('roles.permission.attach');
Route::put('/{role}/detach', [RoleController::class, 'detach'])->name('roles.permission.detach');
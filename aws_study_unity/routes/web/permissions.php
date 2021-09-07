<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;

Route::get('', [PermissionController::class, 'index'])->name('permissions.index');
Route::post('', [PermissionController::class, 'store'])->name('permissions.store');
Route::get('/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
Route::delete('/{permission}/destroy', [PermissionController::class, 'destroy'])->name('permissions.destroy');
Route::put('/{permission}/update', [PermissionController::class, 'update'])->name('permissions.update');
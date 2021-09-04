<?php

use Illuminate\Support\Facades\Route;

Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post');

Route::middleware('auth')->group(function() {
    Route::get('', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
    Route::get('/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
    Route::get('/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
    Route::post('', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
    Route::patch('/{post}/update', [App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
    Route::delete('/{post}/destroy', [App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');
});
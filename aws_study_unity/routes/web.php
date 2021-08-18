<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/about', function () {
//     return "Hi about page";
// });

// Route::get('/contact', function () {
//     return "contact";
// });

// Route::get('/post/{id}/{name}', function ($id, $name) {
//     return 'This is post number ' . $id . ' ' . $name;
// });

// Route::get('/admin/post/examples',array('as' => 'admin.post' , function () {
//     return "This url " . route('admin.post');
// }));

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/post/{id}', [App\Http\Controllers\PostController::class, 'index']);
Route::get('/posts/contact', [App\Http\Controllers\PostController::class, 'contact']);
Route::get('/posts/{id}/{name}/{password}', [App\Http\Controllers\PostController::class, 'show_post']);
// Route::resource('posts', App\Http\Controllers\PostController::class);
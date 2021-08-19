<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

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

// Route::get('/', function () {
//     return view('welcome');
// });

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

Route::get('/insert', function() {

    // モデルなし
    // DB::insert('insert into posts(title, contents) values(?, ?)', ['First title!', 'Laravel is very useful!!!']);
    
    // モデル指定
    // Post::insert([
    //     'title'     =>  'Second title...',
    //     'contents'  =>  'Learning PHP is very fun!'
    // ]);

});

// Route::get('/read', function() {

//     $results = DB::select('select * FROM posts WHERE id = ?', [1]);
//     dd($results);
// });

// Route::get('/update', function() {

//     $updated = DB::update('UPDATE posts SET title = "update_title", contents = "update body" WHERE id=?', [1]);

// });

Route::get('/find', function() {


    // $posts = Post::all();

    // // dd($posts);
    // $post_titles_str = '';
    // foreach($posts as $post) {
    //     $post_titles_str .= $post->title . "<br>";
    // }
    // return $post_titles_str;

    // $post = Post::find(1);

    // dd($post);

});

// Route::get('/findwhere', function() {



//     $posts = Post::where('id', '>=', 1)->get();

//     dd($posts);


// });

// Route::get('/basicinsert', function() {
//     $post = Post::find(2);
//     $post->title = 'Nice title 2';
//     $post->contents = 'This is content! 2';
//     $post->save();
// });

Route::get('/create', function() {
    Post::create([
        'title'     =>  'PHP',
        'contents'  =>  'It is a content'
    ]);
});

// Route::get('/update', function() {
//     Post::where('id', 2)
//         ->where('is_admin', 0)
//         ->update([
//             'title' => 'Hello Update',
//             'contents' => 'Hello Contents Update'
//         ]);
// });

// Route::get('/delete', function() {
//     Post::where('id', 2)->delete();
// });

// Route::get('/softdelete', function() {
//     Post::find(2)->delete();
// });

// Route::get('/readsoftdelete', function() {
//     //$post = Post::find(1);

//     // onlytrashedはソフトデリートされたモデルのみ、withtrashedはデリーとされていないモデルも出力
//     $post = Post::onlyTrashed()->where('id', 1)->first();
//     dd($post);

// });

// Route::get('/restore', function() {
//     Post::withTrashed()->where('is_admin', 0)->restore();
// });

// Route::get('/forcedelete', function() {
//     Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
// });
<?php

use Illuminate\Support\Facades\Route;
// use App\Models\Post;
// use App\Models\User;
// use App\Models\Country;
// use App\Models\Photo;
// use App\Models\Tag;

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

// // Route::get('/', function () {
// //     return view('welcome');
// // });

// // Route::get('/about', function () {
// //     return "Hi about page";
// // });

// // Route::get('/contact', function () {
// //     return "contact";
// // });

// // Route::get('/post/{id}/{name}', function ($id, $name) {
// //     return 'This is post number ' . $id . ' ' . $name;
// // });

// // Route::get('/admin/post/examples',array('as' => 'admin.post' , function () {
// //     return "This url " . route('admin.post');
// // }));

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// // Route::get('/post/{id}', [App\Http\Controllers\PostController::class, 'index']);
// Route::get('/posts/contact', [App\Http\Controllers\PostController::class, 'contact']);
// Route::get('/posts/{id}/{name}/{password}', [App\Http\Controllers\PostController::class, 'show_post']);
// // Route::resource('posts', App\Http\Controllers\PostController::class);

// Route::get('/insert', function() {

//     // モデルなし
//     // DB::insert('insert into posts(title, contents) values(?, ?)', ['First title!', 'Laravel is very useful!!!']);
    
//     // モデル指定
//     // Post::insert([
//     //     'title'     =>  'Second title...',
//     //     'contents'  =>  'Learning PHP is very fun!'
//     // ]);

// });

// // Route::get('/read', function() {

// //     $results = DB::select('select * FROM posts WHERE id = ?', [1]);
// //     dd($results);
// // });

// // Route::get('/update', function() {

// //     $updated = DB::update('UPDATE posts SET title = "update_title", contents = "update body" WHERE id=?', [1]);

// // });

// Route::get('/find', function() {


//     // $posts = Post::all();

//     // // dd($posts);
//     // $post_titles_str = '';
//     // foreach($posts as $post) {
//     //     $post_titles_str .= $post->title . "<br>";
//     // }
//     // return $post_titles_str;

//     // $post = Post::find(1);

//     // dd($post);

// });

// // Route::get('/findwhere', function() {



// //     $posts = Post::where('id', '>=', 1)->get();

// //     dd($posts);


// // });

// // Route::get('/basicinsert', function() {
// //     $post = Post::find(2);
// //     $post->title = 'Nice title 2';
// //     $post->contents = 'This is content! 2';
// //     $post->save();
// // });

// Route::get('/create', function() {
//     Post::create([
//         'title'     =>  'PHP',
//         'contents'  =>  'It is a content'
//     ]);
// });

// // Route::get('/update', function() {
// //     Post::where('id', 2)
// //         ->where('is_admin', 0)
// //         ->update([
// //             'title' => 'Hello Update',
// //             'contents' => 'Hello Contents Update'
// //         ]);
// // });

// // Route::get('/delete', function() {
// //     Post::where('id', 2)->delete();
// // });

// // Route::get('/softdelete', function() {
// //     Post::find(2)->delete();
// // });

// // Route::get('/readsoftdelete', function() {
// //     //$post = Post::find(1);

// //     // onlytrashedはソフトデリートされたモデルのみ、withtrashedはデリーとされていないモデルも出力
// //     $post = Post::onlyTrashed()->where('id', 1)->first();
// //     dd($post);

// // });

// // Route::get('/restore', function() {
// //     Post::withTrashed()->where('is_admin', 0)->restore();
// // });

// // Route::get('/forcedelete', function() {
// //     Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
// // });


// //ここから ELOQUENT RELATIONSHIP

// // 1 to 1
// // Route::get('/user/{id}/post', function($id) {
// //     dd(User::find($id)->post->title);
// // });

// // Route::get('/post/{id}/user', function($id) {
// //     return Post::find($id)->user->name;
// // });

// // Route::get('/posts', function() {
// //     $user = User::find(1); 

// //     foreach($user->posts as $post) {
// //         echo $post->title . "<br>";   
// //     }
// // });

// // Route::get('/user/{id}/role', function($id) {
// //     $user = User::find($id);

// //     dd($user->roles);
// // });

// // Route::get('/user/pivot', function() {
// //     $user = User::find(1);

// //     foreach($user->roles as $role) {
// //         echo $role->pivot->id;
// //     }
// // });

// // Route::get('/user/country', function() {
// //     $country = Country::find(1);

// //     foreach($country->posts as $post) {

// //         print_r($post->title);
// //         echo "\n";
// //     }
// // });


// // monopoly

// // Route::get('/user/photos', function() {
// //     $user = User::find(1);

// //     foreach($user->photos as $photo) {
// //         return $photo;
// //     }
// // });

// // Route::get('/post/{id}/photos', function($id) {
// //     $user = Post::find($id);

// //     foreach($user->photos as $photo) {
// //         return $photo;
// //     }
// // });

// // Route::get('/photo/{id}/post', function($id) {


// //     $photo = Photo::findOrFail($id);
// //     return $photo->imageable;


// // });

// // // Many to Many
// // Route::get('/post/{id}/tag', function($id) {
// //     $post = Post::find($id);

// //     foreach($post->tags as $tag) {
// //         echo $tag->name . "<br>";
// //     }
// // });

// // Route::get('/tag/post', function() {
// //     $tag = Tag::find(1);
// //     foreach($tag->posts as $post) {
// //         echo $post . "<br>";
// //     }
// // });

use App\Models\User;
use App\Models\Address;

Route::get('/confirm', function() {
});

Route::get('/insert/{id}', function($id) {
    $user = User::find($id);
    

    $address = new Address(['name' => 'テスト市テスト町']);

    if(!Address::whereUserId($id)->exists()) {
        $user->address()->save($address);
    } else {
        return 'Its address already had';
    }
});

Route::get('/update', function() {

    $address = Address::whereUserId(1)->first();
    $address->name = 'アップデートアドレス';

    $address->save();

});

Route::get('/read', function() {
    $user = User::findOrFail(1);

    return $user->address->name;
});

Route::get('/delete', function() {
    $user = User::findOrFail(1);
    $user->address()->delete();
});
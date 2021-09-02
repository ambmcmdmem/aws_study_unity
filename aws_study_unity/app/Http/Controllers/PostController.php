<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function show($id) {
        $post = Post::find($id);
        return view('blog-post', ['post' => $post]);
    }

    public function create() {
        return view('admin.posts.create');
    }

    public function store() {
        $inputs = request()->validate([
            'title'      => ['required', 'min:8', 'max:255'],
            'post_image' => ['file'],
            'body'       => ['required']
        ]);

        // dd($inputs);

        if(request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);

        return redirect()->back()->with('success', 'Posted!!');
    }
}

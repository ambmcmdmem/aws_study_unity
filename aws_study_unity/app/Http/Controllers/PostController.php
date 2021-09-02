<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    
    public $validateArr = [
        'title'      => ['required', 'min:8', 'max:255'],
        'post_image' => ['file'],
        'body'       => ['required']
    ];

    public function index() {
        $posts = auth()->user()->posts()->get();
        // $posts = Post::orderBy('created_at', 'DESC')->get();
        return view('admin.posts.index', ['posts' => $posts]);
    }

    //
    // public function show($id) {
    //     $post = Post::find($id);
    //     return view('blog-post', ['post' => $post]);
    // }
    public function show(Post $post) {
        return view('blog-post', ['post' => $post]);
    }

    public function create() {
        return view('admin.posts.create');
    }

    public function store() {

        $this->authorize('create', Post::class);

        $inputs = request()->validate($this->validateArr);

        // dd($inputs);

        if(request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);

        return redirect()->back()->with('success', 'Posted!!');
    }

    public function destroy(Post $post) {
        // $post = Post::find($id);
        $sessionKey; $sessionVal;

        $auth = $this->checkAuth($post, 'view');

        if(!empty($auth)) {
            return $auth;
        }

        if($post) {
            $post->delete();
            $sessionKey = 'success';
            $sessionVal = $post->title . ' was deleted!!';
        } else {
            $sessionKey = 'danger';
            $sessionVal = 'It didn\'t work well.';            
        }

        session()->flash($sessionKey, $sessionVal);

        return redirect()->back();
    }

    private function checkAuth(Post $post, $method) {
        if(!auth()->user()->can($method, $post)) {
            return redirect()->route('posts.index')->with('danger', 'You can\'t view that post.');
        }
    }

    public function edit(Post $post) {
        // $post = Post::find($id);
        // $this->authorize('view', $post);

        // if(!auth()->user()->can('view', $post)) {
        //     return redirect()->route('posts.index')->with('danger', 'You can\'t edit that post.');
        // }

        $auth = $this->checkAuth($post, 'view');

        if(!empty($auth)) {
            return $auth;
        }

        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post) {
        // $post = Post::find($id);
        $inputs = request()->validate($this->validateArr);
        // $newPost = new Post([
        //     'title' => $inputs['title'],
        //     'body'  => $inputs['body']
        // ]);

        // if(request('post_image') || !empty($post->post_image)) {
        if(request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
        } elseif(!empty($post->post_image)) {
            $inputs['post_image'] = $post->post_image;
        }
            // $newPost->post_image = $inputs['post_image'];
        // }

        // auth()->user()->posts()->save($newPost);


        $this->authorize('update');

        $post->update($inputs);

        session()->flash('success', 'Post was updated!!');
        return redirect()->route('posts.index');
    }
}

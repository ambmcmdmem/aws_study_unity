<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\CreatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $posts = Post::all();
        // $posts = Post::latest()->get();
        // $posts = Post::orderBy('updated_at', 'DESC')->get();
        $posts = Post::Test()->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //

        $input = $request->all();
        
        if($file = $request->file('file')) {
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $input['path'] = $name;
        }

        Post::create($input);

        // return $request->all();
        // return $request->title;
        // $this->validate($request, [
        //     'title' => 'required',
        //     'content' => 'required'
        // ]);

        // $file = $request->file('file');
        // echo '<br>';

        // echo $file->getClientOriginalName() . '<br>';

        // echo $file->getSize();



        // Post::create([
        //     'user_id' => (int)$request->user_id,
        //     'title' => $request->title,
        //     'contents' => $request->contents
        // ]);

        return redirect('/posts');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::find($id);

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        $post->update([
            'user_id' => (int)$request->user_id,
            'title' => $request->title,
            'contents' => $request->contents
        ]);
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);

        $post->delete();
        return redirect('/posts');
    }

    public function contact() {
        return view('contact');
    }

    public function show_post($id, $name, $password) {
        // return view('post')->with('id', $id);
        return view('post', compact('id', 'name', 'password'));
    }
}

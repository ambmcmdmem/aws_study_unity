@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    <!-- <form action="/posts/{{$post->id}}" method="POST"> -->
    {!! Form::model($post, [
        'method' => 'PATCH',
        'action' => ['App\Http\Controllers\PostController@update', $post->id]
    ]) !!}

        <!-- ！！！！！！必要(PUT)！！！！！ -->
        <!-- <input type="hidden" name="_method" value="PUT"> -->


        <!-- <input type="hidden" name="user_id" value="0"> -->
        {!! Form::hidden('user_id', '0') !!}
        <!-- <input type="text" name="title" placeholder="Enter title..." required value="{{$post->title}}"> -->
        {!! Form::text('title', $post->title, [
            'placeholder' => 'Enter title...',
            'required' => true
        ]) !!}
        <!-- <textarea name="contents" id="" cols="30" rows="10">{{$post->contents}}</textarea> -->
        {!! Form::textarea('contents', $post->contents, [
            'cols' => '30',
            'rows' => '10',
            'required' => true
        ]) !!}
        <!-- <button type="submit">SUBMIT</button> -->
        {!! Form::button('SUBMIT', [
            'type' => 'submit'    
        ]) !!}
    {!! Form::close() !!}
@endsection

@yield('footer')
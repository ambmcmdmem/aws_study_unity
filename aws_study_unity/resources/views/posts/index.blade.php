@extends('layouts.app')

@section('content')

<a href="/posts/create">CREATE</a>
@if($posts)
<ul>
    @foreach($posts as $post)
    <li>
        <a href="/posts/{{$post->id}}">{{$post->title}}</a>
        @unless(empty($post->path))
            <img class="d-block" src="{{$post->path}}" alt="{{$post->title}}" width=100 height=100 style="object-fit: cover;">
        @endunless
    </li>
    @endforeach
</ul>
@endif

@endsection

@yield('footer')
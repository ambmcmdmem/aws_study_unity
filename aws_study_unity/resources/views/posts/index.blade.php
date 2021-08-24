@extends('layouts.app')

@section('content')

<a href="/posts/create">CREATE</a>
@if($posts)
<ul>
    @foreach($posts as $post)
    <li>
        <a href="/posts/{{$post->id}}">{{$post->title}}</a>
    </li>
    @endforeach
</ul>
@endif

@endsection

@yield('footer')
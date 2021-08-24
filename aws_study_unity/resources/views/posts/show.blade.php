@extends('layouts.app')

@section('content')
<h1>{{$post->title}}</h1>
<a href="/posts/{{$post->id}}/edit">UPDATE</a>
{!! Form::model($post, [
    'method' => 'DELETE',
    'action' => ['App\Http\Controllers\PostController@destroy', $post->id],
    'id' => 'delete_form'
]) !!}
<!-- <form id="delete_form" action="/posts/{{$post->id}}" method="POST"> -->
    @csrf
    <!-- <input type="hidden" name="_method" value="DELETE"> -->
    <a class='' onclick="confirmFunc();">DELETE</a>
{!! Form::close() !!}
<script>
    function confirmFunc() {
        const ret = confirm('Really?');
        const delete_form = document.getElementById('delete_form');
        if(ret === true) {
            delete_form.submit();
        }
    }
</script>
@endsection


@yield('footer')
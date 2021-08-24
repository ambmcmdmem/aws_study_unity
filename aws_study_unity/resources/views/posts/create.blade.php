@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    <!-- <form action="/posts" method="POST"> -->
    {!! Form::open([
        'method' => 'POST',
        'route' => 'posts.store'
    ]) !!}

        <!-- <input type="text" name="title" placeholder='Enter title'> -->
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, [
            'placeholder' => 'Enter title'
        ]) !!}
        <!-- <input type="hidden" name="user_id" value="0"> -->
        {!! Form::hidden('user_id', '0') !!}
        <!-- <textarea name="contents" id="" cols="30" rows="10"></textarea> -->
        {!! Form::label('contents', 'Contents') !!}
        {!! Form::textarea('contents', null, [
            'cols' => '30',
            'rows' => '10',
            'placeholder' => 'Enter Contents',
            'max' => '50',
        ]) !!}
        <!-- <button type="submit">SUBMIT</button> -->
        {!! Form::submit('SUBMIT') !!}
    <!-- </form> -->
    {!! Form::close() !!}

    @if(count($errors) > 0):
        <div class="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

@yield('footer')
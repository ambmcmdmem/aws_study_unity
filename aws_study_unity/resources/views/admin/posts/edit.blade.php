<x-admin-master>
@section('content')
    <h1>Edit</h1>
    
    {!! Form::open([
        'method' => 'PATCH',
        'route'  => ['posts.update', $post->id],
        'files'  => true
    ]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Enter title') !!}
            {!! Form::text('title', $post->title, [
                'class'            => 'form-control',
                'aria-describedby' => '',
                'placeholder'      => 'Enter title',
                'required'         => true
            ]) !!}
            @error('title')
                <?php print_r($errors); ?>
            @enderror
        </div>
        <div class="form-group">
            @unless(empty($post->post_image))
                <img class="d-block" src="{{$post->post_image}}" alt="image">
            @endunless

            {!! Form::label('post_image', 'File') !!}
            {!! Form::file('post_image', [
                'class' => 'form-control-file'
            ]) !!}
        </div>
        <div>
            {!! Form::label('body', 'body') !!}
            {!! Form::textarea('body', $post->body, [
                'class'    => 'form-control',
                'cols'     => '30',
                'rows'     => '10',
                'required' => true
            ]) !!}
        </div>
        {!! Form::button('SUBMIT', [
            'class' => 'btn btn-primary',
            'type'  => 'submit'
        ]) !!}
    {!! Form::close() !!}

@endsection
</x-admin-master>
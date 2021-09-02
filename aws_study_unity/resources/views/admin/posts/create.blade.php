<x-admin-master>
@section('content')
    <h1>Create</h1>
    
    {!! Form::open([
        'method' => 'POST',
        'route'  => 'posts.store',
        'files'  => true
    ]) !!}
        @csrf
        <div class="form-group">
            {!! Form::label('title', 'Enter title') !!}
            {!! Form::text('title', null, [
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
            {!! Form::label('post_image', 'File') !!}
            {!! Form::file('post_image', [
                'class' => 'form-control-file'
            ]) !!}
        </div>
        <div>
            {!! Form::label('body', 'body') !!}
            {!! Form::textarea('body', null, [
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
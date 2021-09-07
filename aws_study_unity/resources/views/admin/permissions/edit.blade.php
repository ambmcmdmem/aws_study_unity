<x-admin-master>
@section('content')
    <div class="col-sm-6">
        <h1>Edit permission: {{$permission->name}}</h1>
        {!! Form::open([
            'method' => 'PUT',
            'route'  => ['permissions.update', $permission]    
        ]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', $permission->name, [
                    'class' => 'form-control'
                ]) !!}
            </div>

            {!! Form::button('Update', [
                'class' => 'btn btn-primary',
                'type'  => 'submit'    
            ]) !!}

        {!! Form::close() !!}
    </div>
@endsection
</x-admin-master>
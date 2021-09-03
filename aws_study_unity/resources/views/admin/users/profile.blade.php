<x-admin-master>
@section('content')
    <h1>User Profile : {{$user->name}}</h1>

    <div class="row">
        <div class="col-sm-6">
            {!! Form::open([
                'method' => 'PUT',
                'route'  => ['users.profile.update', $user],
                'files'  => true
            ]) !!}

                <div class="mb-4">
                    <img class="img-profile rounded-circle" src="{{$user->avatar}}" alt="" width="60" height="60" style="object-fit: cover;">
                </div>

                <div class="form-group">
                    {!! Form::file('avatar') !!}

                    @error('avatar')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('username', 'Username') !!}
                    {!! Form::text('username', $user->username, [
                        'class'    => 'form-control',
                        'required' => true
                    ]) !!}
                    
                    @error('username')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', $user->name, [
                        'class'    => 'form-control',
                        'required' => true
                    ]) !!}

                    @error('name')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'E-mail') !!}
                    {!! Form::email('email', $user->email, [
                        'class'    => 'form-control',
                        'required' => true
                    ]) !!}

                    @error('email')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                
                <div class="form-group">
                    {!! Form::label('password', 'Passoword') !!}
                    {!! Form::password('password', [
                        'class'    => 'form-control',
                        'required' => true
                    ]) !!}

                    @error('password')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Password Confirm') !!}
                    {!! Form::password('password_confirmation', [
                        'class'    => 'form-control',
                        'required' => true
                    ]) !!}

                    @error('password_confirmation')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                {!! Form::button('SUBMIT', [
                    'class' => 'btn btn-primary',
                    'type'  => 'submit'
                ]) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection
</x-admin-master>
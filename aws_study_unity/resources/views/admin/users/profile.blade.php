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

    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Options</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Attach</th>
                                <th>Detach</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Options</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Attach</th>
                                <th>Detach</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                @foreach($roles as $role)
                                <tr>
                                    <td>{!! Form::checkbox('', '', false, [
                                        'checked' => $user->userHasRole($role->name)
                                    ]) !!}</td>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->slug}}</td>
                                    <td>
                                        {!! Form::open([
                                            'method' => 'PUT',
                                            'route'  => ['users.role.attach', $user]
                                        ]) !!}
                                            {!! Form::button('Attach', [
                                                'class'    => 'btn btn-primary',
                                                'type'     => 'submit',
                                            ]) !!}
                                            {!! Form::hidden('role', $role->id) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open([
                                            'method' => 'PUT',
                                            'route'  => ['users.role.detach', $user]
                                        ]) !!}
                                            {!! Form::button('Detach', [
                                                'class'    => 'btn btn-danger',
                                                'type'     => 'submit',
                                            ]) !!}
                                            {!! Form::hidden('role', $role->id) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
</x-admin-master>
<x-admin-master>
@section('content')

    <div class="row">
        <div class="col-sm-6">
            <h1>Edit Role: {{$role->name}}</h1>
            {!! Form::open([
                'method' => 'PUT',
                'route'  => ['roles.update', $role]    
            ]) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', $role->name, [
                        'class' => 'form-control'
                    ]) !!}
                </div>

                {!! Form::button('Update', [
                    'class' => 'btn btn-primary',
                    'type'  => 'submit'    
                ]) !!}

            {!! Form::close() !!}
        </div>
    </div>

    <div class="row">
        @if($permissions->isNotEmpty())
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
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
                            @foreach($permissions as $permission)
                            <?php $permissionContainBool = $role->permissions->contains($permission); ?>
                            <tr>
                                <td>{!! Form::checkbox('options', true, $permissionContainBool) !!}</td>
                                <td>{{$permission->id}}</td>
                                <td>{{$permission->name}}</td>
                                <td>{{$permission->slug}}</td>
                                <td>
                                    {!! Form::open([
                                        'method' => 'PUT',
                                        'route'  => ['roles.permission.attach', $role]
                                    ]) !!}
                                        {!! Form::hidden('permission', $permission->id) !!}
                                        {!! Form::button('Attach', [
                                            'class'    => 'btn btn-primary',
                                            'type'     => 'submit',
                                            'disabled' => $permissionContainBool
                                        ]) !!}

                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    {!! Form::open([
                                        'method' => 'PUT',
                                        'route'  => ['roles.permission.detach', $role]
                                    ]) !!}
                                        {!! Form::hidden('permission', $permission->id) !!}
                                        {!! Form::button('Detach', [
                                            'class'    => 'btn btn-danger',
                                            'type'     => 'submit',
                                            'disabled' => !$permissionContainBool
                                        ]) !!}

                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>

@endsection
</x-admin-master>
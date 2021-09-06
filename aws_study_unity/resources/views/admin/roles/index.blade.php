<x-admin-master>
@section('content')
    <div class="row">
        <div class="col-sm-3">
            {!! Form::open([
                'method' => 'POST',
                'route'  => 'roles.store'
            ]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, [
                        'class'    => 'form-control',
                        'required' => true
                    ]) !!}
                    
                    @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    @error('slug')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                {!! Form::button('Create', [
                    'class' => 'btn btn-primary btn-block',
                    'type'  => 'submit'
                ]) !!}
            {!! Form::close() !!}
        </div>
        
        <div class="col-sm-9">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Delete</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                @foreach($roles as $role)
                                <tr>
                                    <td>{{$role->id}}</td>
                                    <td><a href="{{route('roles.edit', $role)}}">{{$role->name}}</a></td>
                                    <td>{{$role->slug}}</td>
                                    <td>{{$role->created_at->diffForHumans()}}</td>
                                    <td>{{$role->updated_at->diffForHumans()}}</td>
                                    <td>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route'  => ['roles.destroy', $role]
                                        ]) !!}
                                            {!! Form::button('Delete', [
                                                'class' => 'btn btn-danger',
                                                'type'  => 'submit'
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
        </div>
    </div>
@endsection
</x-admin-master>
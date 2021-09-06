<x-admin-master>
@section('content')
    <h1>Permissions</h1>

    {!! Form::open([
        'route'  => 'permissions.store',
        'method' => 'POST'
    ]) !!}
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, [
            'class'    => 'form-control',
            'required' => true   
        ]) !!}

        {!! Form::button('Create', [
            'class' => 'btn btn-primary',
            'type'  => 'submit'    
        ]) !!}
    {!! Form::close() !!}

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
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Delete</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @foreach($permissions as $permission)
                        <tr>
                            <td>{{$permission->id}}</td>
                            <td><a href="{{route('permissions.edit', $permission)}}">{{$permission->name}}</a></td>
                            <td>{{$permission->slug}}</td>
                            <td>
                                {!! Form::open([
                                    'method' => 'DELETE',
                                    'route'  => ['permissions.destroy', $permission]    
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

@endsection


@section('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="{{asset('js/demo/datatables-demo.js')}}"></script> -->

    <script>
        const confirmFunc = (id) => {
            const ret = confirm('really?');
            const delete_form = document.getElementById('delete_form' + id);
            if(ret) {
                delete_form.submit();
            }
        };

        const delete_btns = document.getElementsByClassName('delete_btn');
        for(let i = 0; i < delete_btns.length; i++) {
            const delete_btn = delete_btns[i];
            delete_btn.addEventListener('click', () => {
                const btn_id = delete_btn.id;
                const id = btn_id.replace(/[^0-9]/g, '');
                confirmFunc(id);
            });
        }
    </script>
@endsection
</x-admin-master>
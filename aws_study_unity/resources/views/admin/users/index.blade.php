<x-admin-master>
@section('content')
    <h1>Users</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="usersTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Registerd date</th>
                    <th>Updated profile date</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Registerd date</th>
                    <th>Updated profile date</th>
                    <th>Delete</th>
                </tr>
                </tfoot>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->username}}</td>
                        <td>
                            <img src="{{$user->avatar}}" alt="{{$user->username}} image" width="200">
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                        <td>
                            {!! Form::open([
                                'route'  => ['users.profile.destroy', $user],
                                'method' => 'delete'
                            ]) !!}
                                {!! Form::button('DELETE', [
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
    <div class="pagination justify-content-center">
        {{ $users->links('vendor.pagination.default') }}
    </div>
@endsection

@section('scripts')
<!-- Page level plugins -->
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<!-- <script src="{{asset('js/demo/datatables-demo.js')}}"></script> -->
@endsection
</x-admin-master>
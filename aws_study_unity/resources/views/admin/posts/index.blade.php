<x-admin-master>

@section('content')
    <h1>All Posts</h1>
    
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
                    <th>Title</th>
                    <th>User</th>
                    <th>Image</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>User</th>
                    <th>Image</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                </tfoot>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>
                            @empty($post->post_image)
                                none
                            @else
                                <img src="{{$post->post_image}}" alt="{{$post->title}} image" width="200">
                            @endempty
                        </td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary">
                            UPDATE
                            </a>
                        </td>
                        <td>
                            {!! Form::open([
                                'method' => 'DELETE',
                                'route'  => ['posts.destroy', $post->id],
                                'id'     => 'delete_form' . $post->id
                            ]) !!}
                                {!! Form::button('DELETE', [
                                    'id'      => 'delete_btn' . $post->id,
                                    'class'   => 'btn btn-danger delete_btn',
                                    'type'    => 'button',
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
        {{ $posts->links('vendor.pagination.default') }}
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
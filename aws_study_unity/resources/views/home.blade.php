<x-home-master>

@section('content')
<h1>Home</h1>
<h1 class="my-4">Page Heading
    <small>Secondary Text</small>
</h1>

<!-- Blog Post -->
@foreach($posts as $post)
<div class="card mb-4">
    @unless(empty($post->image))
    <img class="card-img-top" src="{$post->image}" alt="{$post->title} image">
    @endunless

    <div class="card-body">
    <h2 class="card-title">{{$post->title}}</h2>
    <p class="card-text" style="display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    overflow: hidden;">{{$post->body}}</p>
    <a href="/post" class="btn btn-primary">Read More &rarr;</a>
    </div>
    <div class="card-footer text-muted">
    Posted on {{$post->created_at->diffForHumans()}} by
    <a href="#">Start Bootstrap</a>
    </div>
</div>
@endforeach

<!-- Pagination -->
<ul class="pagination justify-content-center mb-4">
    <li class="page-item">
    <a class="page-link" href="#">&larr; Older</a>
    </li>
    <li class="page-item disabled">
    <a class="page-link" href="#">Newer &rarr;</a>
    </li>
</ul>
@endsection

</x-home-master>
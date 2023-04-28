@extends('admin.layouts.main')


@section('container')    
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <a href="/posts/{{ $post->slug }}"><h2>{{ $post->title }}</h2></a>
            <h5>
                <a href="/dashboard/posts" class="btn btn-success btn-sm"><i class="bi bi-arrow-left"></i> Back to My Post</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                </form>
            </h5>
            
            <div style="max-height: 500px; overflow: hidden;">
                <img src="{{ @$post->image ? asset('storage/'.$post->image) : "https://source.unsplash.com/1200x500?{$post->category->name}" }}" class="card-img-top img-fluid mt-2" alt="{{ $post->category->name }}">
            </div>
            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
            <a href="javascript:void()" onclick="window.history.go(-1); return false;">Go Back!</a>
            
        </div>
    </div>
</div>
@endsection

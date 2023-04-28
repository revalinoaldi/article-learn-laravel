@extends('layouts.main')
@section('container')

<h1 class="mb-3 text-center">{{ $title }}</h1>

<div class="row mb-3 justify-content-center">
    <div class="col-md-6">
        <form action="/blog">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif

            @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search ...." name="search" value="{{ request('search') }}">
                <button class="btn btn-danger" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>

@if ($posts->count())
<div class="card mb-3">
    <div style="max-height: 400px; overflow: hidden;">
        <img src="{{ @$posts[0]->image ? asset('storage/'.$posts[0]->image) : "https://source.unsplash.com/1200x400?{$posts[0]->category->name}" }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
    </div>
    <div class="card-body text-center">
        <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark"><h3 class="card-title">{{ $posts[0]->title }}</h3></a>
        <p class="card-text">{{ $posts[0]->excerpt }}</p>
        <p class="card-text"><small class="text-muted">By : <a href="/blog?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> | Category : <a href="/blog?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> | {{ $posts[0]->created_at->diffForHumans() }} </small></p>
        <p><a href="/posts/{{ $posts[0]->slug }}" class="btn btn-primary">Read More!</a></p>
    </div>
    
</div>


<div class="container">
    <div class="row">
        @foreach ($posts->skip(1) as $post)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.6)">
                    <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none text-white">
                        {{ $post->category->name }}
                    </a>
                </div>                
                <img src="{{ @$post->image ? asset('storage/'.$post->image) : "https://source.unsplash.com/500x400?{$post->category->name}" }}" class="card-img-top" alt="{{ $post->category->name }}">                
                <div class="card-body">
                    <h5 class="card-title"><a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a></h5>
                    <p class="card-text"><small class="text-muted">By : <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> | {{ $post->created_at->diffForHumans() }} </small></p>
                    <p class="card-text">{{ $post->excerpt }}...</p>
                    <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More!</a>
                </div>
            </div>
        </div>
        @endforeach
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>

@else
<p class="text-center fs-4">Posts Not Found.</p>
@endif

@endsection
@extends('layouts.main')
@section('container')
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <a href="/posts/{{ $post->slug }}"><h2>{{ $post->title }}</h2></a>
            <h5>By : <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> | Category : <a href="/blog?category={{ $post->category->slug }}">{{ $post->category->name }}</a></h5>
            
            <img src="{{ @$post->image ? asset('storage/'.$post->image) : "https://source.unsplash.com/1200x500?{$post->category->name}" }}" class="card-img-top img-fluid" alt="{{ $post->category->name }}">

            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
            <a href="javascript:void()" onclick="window.history.go(-1); return false;">Go Back!</a>
            
        </div>
    </div>
</div>
@endsection
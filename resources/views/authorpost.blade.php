@extends('layouts.main')
@section('container')
    <article>
        
        <h2>Posts Author : <a href="/author/{{ $name }}">{{ $name }}</a></h2>

        @foreach ($posts as $post)
            <a href="/posts/{{ $post->slug }}"><h2>{{ $post->title }}</h2></a>
            <h5>By : {{ $post->author->name }} | Category : <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></h5>
            <p>{{ $post->excerpt }}... <a href="/posts/{{ $post->slug }}">Read More!</a></p>
        @endforeach
    </article>
@endsection
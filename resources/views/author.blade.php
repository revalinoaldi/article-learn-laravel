@extends('layouts.main')
@section('container')
    <h1>Authors</h1>
    <ul>
        @foreach ($authors as $author)
            <li><a href="/blog?author={{ $author->username }}"><h4>{{ $author->name }}</h4></a></li>
        @endforeach
    </ul>
@endsection
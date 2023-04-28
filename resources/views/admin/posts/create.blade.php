@extends('admin.layouts.main')


@section('container')    
<link rel="stylesheet" href="/plugins/trix/dist/trix.css">
<script src="/plugins/trix/dist/trix.js"></script>

<style>
    trix-toolbar [data-trix-button-group="file-tools"]{
        display: none;
    }
</style>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        @if (@$post->slug)
            Update Post 
        @else
            Create new Post
        @endif
        
    </h1>
</div>

@if (session('notif'))
{!! session('notif') !!}
@endif

<div class="row">
    <div class="col-lg-8">
        <form action="/dashboard/posts{{ @$post->slug ? "/".$post->slug : '' }}" method="POST" class="mb-4" enctype="multipart/form-data">
            @if (@$post->slug)
                @method('put')
            @endif
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', @$post->title) }}" id="title" name="title" placeholder="Enter Title" required>
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ old('slug', @$post->slug) }}" name="slug" placeholder="Enter Title to get SLug" required readonly>
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Category</label>
                <select name="kategori" id="kategori" class="form-select @error('kategori') is-invalid @enderror" >
                    @foreach ($categories as $cat)
                        <option {{ old('kategori', @$post->category->id) == $cat->id ? 'selected=""' : '' }} value="{{ $cat->id }}">
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
                @error('kategori')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="hidden" value="{{ @$post->image }}" name="oldImage">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" required accept="image/*" onchange="loadFile(event,`avatarPreview`)">
                <div class="mt-3">
                    <img src="{{ @$post->image ? asset('storage/' . $post->image) : '' }}" alt="" id="avatarPreview" class="rounded img-fluid col-sm-7"><br>
                </div>
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Body Post</label>
                <input type="hidden" id="body" name="body" value="{{ old('body', @$post->body) }}" class="@error('body') is-invalid @enderror">
                <trix-editor input="body"></trix-editor>
                @error('body')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save Post</button>
        </form>
    </div>
</div>

<script>
    
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', () => {
        fetch(`/dashboard/posts/checkSlug?title=${title.value}`)
        .then(res => res.json())
        .then(data => slug.value = data.slug)
    })

    document.addEventListener('trix-file-accept',(e) => {
        e.preventDefault()
    })

    var loadFile = function(event,target) {
        var avatar = document.getElementById(target);
        avatar.src = URL.createObjectURL(event.target.files[0]);
        avatar.onload = function() {
            URL.revokeObjectURL(avatar.src) // free memory
        }
    };
</script>
@endsection

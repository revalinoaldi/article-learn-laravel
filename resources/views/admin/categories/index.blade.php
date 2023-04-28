@extends('admin.layouts.main')


@section('container')    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Posts Categories</h1>
</div>

@if (session('notif'))
    {!! session('notif') !!}
@endif

<div class="table-responsive col-lg-12">
    <a href="/dashboard/categories/create" class="btn btn-primary btn-sm my-3"><i class="bi bi-file-earmark-plus"></i> Create new Category</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($categories as $cat)                
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $cat->name }}</td>
                    <td class="text-center">
                        <a href="/dashboard/categories/{{ $cat->slug }}/edit" class="badge bg-warning">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="/dashboard/categories/{{ $cat->slug }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button onclick="return confirm('Are you sure?')" class="badge bg-danger border-0">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection

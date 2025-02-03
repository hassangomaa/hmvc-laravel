@extends('blog::layouts.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>All Blog Posts</h2>
        <a href="{{ route('blogs.create') }}" class="btn btn-primary">Create New Post</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $blog)
                        <tr>
                            <td>{{ $blog->id }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ Str::limit($blog->content, 50) }}</td>
                            <td>
                                <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('blogs.destroy', $blog) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No posts found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $blogs->links() }}
        </div>
    </div>
@endsection

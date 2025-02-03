@extends('blog::layouts.master')

@section('content')
    <h2>Edit Blog Post</h2>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('blogs.update', $blog) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $blog->title }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Content</label>
                    <textarea name="content" class="form-control" rows="5" required>{{ $blog->content }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Update Post</button>
                <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection

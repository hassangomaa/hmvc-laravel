@extends('blog::layouts.master')

@section('content')
    <h2>Create New Blog Post</h2>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('blogs.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Content</label>
                    <textarea name="content" class="form-control" rows="5" required></textarea>
                </div>

                <button type="submit" class="btn btn-success">Save Post</button>
                <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection

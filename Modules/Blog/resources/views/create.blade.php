@extends('blog::layouts.master')

@section('content')
    <h1>Create a New Blog Post</h1>

    <form method="POST" action="{{ route('blog.store') }}">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required>
        </div>

        <div>
            <label for="content">Content</label>
            <textarea id="content" name="content" required></textarea>
        </div>

        <button type="submit">Create Blog Post</button>
    </form>
@endsection

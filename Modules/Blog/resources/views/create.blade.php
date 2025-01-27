@extends('blog::layouts.master')

@section('content')

    <h1>Create a New Blog Post</h1>
    <form method="POST" action="/blog/store">
        @csrf
        <label for="title">Title:</label>
        <input type="text" id="title" name="title">
        <button type="submit">Create</button>
    </form>


@endsection

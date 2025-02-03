<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Blog Module - {{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="{{ $description ?? 'A modern blog system' }}">
    <meta name="keywords" content="{{ $keywords ?? 'blog, articles, posts' }}">
    <meta name="author" content="{{ $author ?? 'Admin' }}">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>

    {{-- Vite CSS --}}
    {{-- {{ module_vite('build-blog', 'resources/assets/sass/app.scss', storage_path('vite.hot')) }} --}}
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('blogs.index') }}">Blog Module</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blogs.index') }}">All Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blogs.create') }}">Create Post</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; {{ date('Y') }} Blog Module. All rights reserved.</p>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Vite JS --}}
    {{-- {{ module_vite('build-blog', 'resources/assets/js/app.js', storage_path('vite.hot')) }} --}}
</body>

</html>

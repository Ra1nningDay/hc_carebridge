<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $user->name }}'s Posts</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>{{ $user->name }}'s Posts</h1>
        
        @if ($posts->isEmpty())
            <p>No posts found.</p>
        @else
            @foreach ($posts as $post)
                <div class="post mb-4">
                    <h2><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2>
                    <p>{{ Str::limit($post->body, 100) }}</p>
                    <p class="text-muted">Created at: {{ $post->created_at->format('F j, Y') }}</p>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">แก้ไข</a>
                </div>
            @endforeach
        @endif
    </div>
</body>
</html>

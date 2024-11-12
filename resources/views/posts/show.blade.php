@extends('layouts.app')

@section('title', 'Post')

@section('content')
    <div class="container mt-5">
        <h1>{{ $post->title }}</h1>
        <p class="text-muted">Posted on {{ $post->created_at->format('M d, Y') }}</p>
        
        <div class="post-content mb-4">
            <p>{{ $post->content }}</p>
        </div>
        
        <h4>Add a Comment</h4>
        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        
        <form action="{{ route('posts.comments.store', $post->id) }}" method="POST">
            @csrf
            <div class="form-group mb-2">
                <textarea class="form-control" name="content" rows="3" required placeholder="Write your comment here..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <h3 class="mt-4">Comments</h3>
        <div class="comments">
            @foreach ($post->comments->whereNull('parent_id') as $comment)
                <div class="card mb-2">
                    <div class="card-body">
                        <p class="card-text">{{ $comment->content }}</p>
                        <p class="text-muted small">Commented by {{ $comment->user->name }} on {{ $comment->created_at->format('M d, Y') }}</p>
                        
                        <!-- Reply button and form -->
                        <button class="btn btn-link btn-sm p-0" onclick="document.getElementById('reply-form-{{ $comment->id }}').classList.toggle('d-none')">
                            Reply
                        </button>
                        <div id="reply-form-{{ $comment->id }}" class="d-none mt-2">
                            <form action="{{ route('posts.comments.store', $post->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                <div class="form-group mb-2">
                                    <textarea class="form-control" name="content" rows="2" required placeholder="Write your reply here..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Submit Reply</button>
                            </form>
                        </div>

                        <!-- Display nested children comments -->
                        @include('posts.partials.comment-children', ['comments' => $comment->children])
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

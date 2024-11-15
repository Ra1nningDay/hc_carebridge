@extends('layouts.app')

@section('title', 'Post')

@section('content')
<div class="container mt-5">
    <!-- โพสต์ -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h1 class="card-title">{{ $post->title }}</h1>
            <p class="text-muted small">Posted on {{ $post->created_at->format('M d, Y') }}</p>
            <hr>
            <p class="card-text">{{ $post->content }}</p>
        </div>
    </div>

    <!-- เพิ่มความคิดเห็น -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h4 class="mb-3">Add a Comment</h4>
            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('posts.comments.store', $post->id) }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <textarea class="form-control" name="content" rows="3" required placeholder="Write your comment here..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="bi bi-send"></i> Submit
                </button>
            </form>
        </div>
    </div>

    <!-- แสดงความคิดเห็น -->
    <h3 class="mb-4">Comments</h3>
    <div class="comments">
        @foreach ($post->comments->whereNull('parent_id') as $comment)
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <p class="card-text mb-1">{{ $comment->content }}</p>
                        <small class="text-muted">{{ $comment->created_at->format('M d, Y') }}</small>
                    </div>
                    <p class="text-muted small mb-2">
                        Commented by <strong>{{ $comment->user->name }}</strong>
                    </p>
                    
                    <!-- ปุ่มตอบกลับ -->
                    <button class="btn btn-link btn-sm p-0" onclick="document.getElementById('reply-form-{{ $comment->id }}').classList.toggle('d-none')">
                        <i class="bi bi-reply"></i> Reply
                    </button>

                    <!-- ฟอร์มตอบกลับ -->
                    <div id="reply-form-{{ $comment->id }}" class="d-none mt-2">
                        <form action="{{ route('posts.comments.store', $post->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                            <div class="form-group mb-2">
                                <textarea class="form-control" name="content" rows="2" required placeholder="Write your reply here..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="bi bi-send"></i> Submit Reply
                            </button>
                        </form>
                    </div>

                    <!-- แสดงความคิดเห็นที่ตอบกลับ -->
                    @include('posts.partials.comment-children', ['comments' => $comment->children])
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

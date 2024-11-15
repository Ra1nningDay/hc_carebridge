@extends('layouts.app')

@section('title', 'Posts')

@section('content')
<div class="container-fluid" style="max-width: 1320px;">
    <div class="row justify-content-evenly">
        <!-- Sidebar -->
        <div class="col-md-3 d-none d-md-flex">
            <div class="min-vh-100 pt-5">
                <h4 class="fw-bold" style="color: #2c3e50;">Recommended</h4>
                <ul class="list-unstyled mt-4">
                    <li><a href="#" class="text-decoration-none text-muted">Recommended Post 1</a></li>
                    <li><a href="#" class="text-decoration-none text-muted">Recommended Post 2</a></li>
                    <li><a href="#" class="text-decoration-none text-muted">Recommended Post 3</a></li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-7">
            <div class="pt-4">
                @if ($posts->isEmpty())
                    <div class="alert alert-warning text-center">No posts found.</div>
                @else
                    @foreach ($posts as $post)
                        <div class="card border-0 border-bottom pb-4 pt-2 mb-3">
                            <div class="card-body">
                                <div class="row g-3">
                                    <!-- Post Info -->
                                    <div class="col-12 col-md-8 d-flex flex-column">
                                        <p class="text-muted mb-1 small">
                                            By: <strong>{{ $post->author->name }}</strong> | {{ $post->created_at->format('F j, Y') }}
                                        </p>
                                        <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none">
                                            <h2 class="fs-4 fw-bold text-dark">{{ $post->title }}</h2>
                                        </a>
                                        <p class="text-muted">{{ Str::limit($post->content, 150) }}</p>
                                        <div class="d-flex justify-content-between align-items-center small text-muted">
                                            <span>Status: <strong>{{ $post->status }}</strong></span>
                                            <span>Comments: {{ $post->comments_count }}</span>
                                            <span>Views: {{ $post->views }}</span>
                                        </div>
                                    </div>

                                    <!-- Post Image -->
                                    <div class="col-12 col-md-4">
                                        @if ($post->image)
                                            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded w-100" alt="{{ $post->title }}">
                                        @else
                                            <div class="d-flex align-items-center justify-content-center bg-light rounded" style="height: 150px; border: 1px solid #ccc;">
                                                <p class="text-muted">No Image</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $posts->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .card:hover {
        background-color: #f9f9f9;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s, box-shadow 0.3s;
    }

    .card-title a:hover {
        color: #f39c12 !important;
    }

    .pagination .page-item.active .page-link {
        background-color: #f39c12;
        border-color: #f39c12;
        color: #fff;
    }

    .pagination .page-link:hover {
        background-color: #f39c12;
        color: #fff;
    }
</style>

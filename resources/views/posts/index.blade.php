@extends('layouts.app')

@section('title', 'Post')

@section('content')
    <div class="container-fluid" style="max-width: 1320px;">
        <div class="row d-flex justify-content-evenly">
            <div class="col-md-3 d-none d-md-flex">
                <div class="min-vh-100">
                    <div class="pt-5">
                        <h4>Recommend</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="min-vh-100 pt-4">
                    @if ($posts->isEmpty())
                        <p>No posts found.</p>
                    @else
                        @foreach ($posts as $post)
                            <div class="card border-0 border-bottom pb-2 pt-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-8 d-flex flex-column">
                                            <p class="text-muted mb-1">By: {{ $post->author->name }} | {{ $post->created_at->format('F j, Y') }}</p>
                                            <a href="{{ route('posts.show', $post->id) }}">
                                                <h1 class="fs-3">{{ $post->title }}</h1>
                                            </a>
                                            <p>{{ Str::limit($post->content, 50) }}</p>
        
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span>Status: {{ $post->status }}</span>
                                                <span>Comments: {{ $post->comments_count }}</span>
                                                <span>Views: {{ $post->views }}</span>
                                            </div>
                                        </div>
        
                                        <div class="col-12 col-md-4">
                                            @if ($post->image)
                                                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded w-100 h-auto" alt="{{ $post->title }}">
                                            @else
                                                <div class="d-flex align-items-center justify-content-center bg-light" style="height: 100%; border: 1px solid #ccc;">
                                                    <p class="text-muted">No Image</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

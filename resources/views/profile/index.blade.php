@extends('layouts.app')

@section('title', $user->name)

@section('content')
<div class="banner" style="background-color: #0056b3; height: 200px; position: relative;">
    <!-- Optional background image in the banner -->
    <!-- <img src="{{ asset('images/banner-image.jpg') }}" alt="Banner Background" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.7;"> -->
</div>

<div class="container" style="margin-top: -100px; position: relative; z-index: 2;">
    <div class="row">
        <!-- Main Profile Section -->
        <div class="col-md-8">
            <!-- User Header Section -->
            <div class="d-flex align-items-center mb-4" style="margin-top: 8rem;">
                <img src="{{ asset('images/profile-avatar.png') }}" alt="User Avatar" class="rounded-circle" width="70" height="70">
                <div class="d-flex justify-content-between ms-3 w-100">
                    <div>
                        <h2 class="mb-0">{{ $user->name }}</h2>
                    </div>
                    @auth
                        @if (Auth::id() === $user->id)
                            <a href="{{ route('profile.edit', Auth::id()) }}" class="btn btn-primary">Edit Profile</a>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Navigation Tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#overview" data-bs-toggle="tab">Overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#posts" data-bs-toggle="tab">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#comments" data-bs-toggle="tab">Comments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#saved" data-bs-toggle="tab">Saved</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#hidden" data-bs-toggle="tab">Hidden</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#upvoted" data-bs-toggle="tab">Upvoted</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#downvoted" data-bs-toggle="tab">Downvoted</a>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content mt-3">
                <div class="tab-pane fade show active" id="overview">
                    <!-- Sample Post -->
                    @if ($posts->isEmpty())
                        <p>No posts found.</p>
                    @else
                        @foreach ($posts as $post)
                        <div class="card mb-3">
                                <div class="card-body">
                                    <h5>{{ $post->title}}</h5>
                                    <p>{{ Str::limit($post->content, 100)}}</p>
                                    <div class="d-flex align-items-center">
                                        <span class="me-3 text-danger">⬆️ 1</span>
                                        <span class="me-3">⬇️ 0</span>
                                        <span class="me-3">💬 0</span>
                                        <span class="me-3">🔗 Share</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <!-- Other Tabs Content (Placeholder) -->
                <div class="tab-pane fade" id="posts">
                    <!-- Sample Post -->
                    @if ($posts->isEmpty())
                        <p>No posts found.</p>
                    @else
                        @foreach ($posts as $post)
                        <div class="card mb-3">
                                <div class="card-body">
                                    <h5>{{ $post->title}}</h5>
                                    <p>{{ Str::limit($post->content, 100)}}</p>
                                    <div class="d-flex align-items-center">
                                        <span class="me-3 text-danger">⬆️ 1</span>
                                        <span class="me-3">⬇️ 0</span>
                                        <span class="me-3">💬 0</span>
                                        <span class="me-3">🔗 Share</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="tab-pane fade" id="comments">User Comments</div>
                <div class="tab-pane fade" id="saved">Saved Posts</div>
                <div class="tab-pane fade" id="hidden">Hidden Posts</div>
                <div class="tab-pane fade" id="upvoted">Upvoted Posts</div>
                <div class="tab-pane fade" id="downvoted">Downvoted Posts</div>
            </div>
        </div>

        <!-- Sidebar Section with Overlapping Effect -->
        <div class="col-md-4" style="margin-top: -50px; z-index: 2;">
            <div class="card shadow">
                <div class="card-body text-center">
                    <img src="{{ asset('images/profile-avatar.png') }}" alt="User Avatar" class="rounded-circle mb-2" width="70" height="70">
                    <h5>{{ $user->name }}</h5>
                    <p>//Rating</p>
                    <p>Area</p>
                </div>
                <hr>
                <div class="card-body">
                    <p>Start When</p>
                    <p><strong>1</strong> Post</p>
                    <p><strong>0</strong> Comment</p>
                </div>
                <div class="card-body p-4">
                    <div class="border p-3">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur quo facere voluptas ab nisi possimus ipsa illo sunt cumque asperiores, natus, harum quaerat explicabo quos, eum ducimus aliquam impedit quod consectetur eligendi. Totam consectetur perspiciatis illo nam velit harum temporibus debitis! Rerum, inventore? Voluptatibus culpa hic sed! Debitis, consequuntur tempora?</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

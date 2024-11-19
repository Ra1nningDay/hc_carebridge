@extends('layouts.app')

@section('title', $user->name)

@section('content')
<!-- Banner Section -->
<div class="banner" style="background-color: #0056b3; height: 250px; position: relative;">
    <!-- Optional: Background image can be added here -->
</div>

<div class="container" style="margin-top: -150px; position: relative; z-index: 2;">
    <div class="row">
        <!-- Main Profile Section -->
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <!-- User Header Section -->
                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ $user->avatar_url }}" alt="User Avatar" class="rounded-circle" width="100" height="100">
                        <div class="ms-3">
                            <h2 class="mb-0">{{ $user->name }}</h2>
                            <p class="text-muted">Joined: {{ $user->created_at->format('F Y') }}</p>
                        </div>
                        @auth
                            @if (Auth::id() === $user->id)
                                <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary ms-auto">Edit Profile</a>
                            @endif
                        @endauth
                    </div>

                    <!-- Navigation Tabs -->
                    <ul class="nav nav-pills mb-3">
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
                        @if ($user->caregiver)
                            <li class="nav-item">
                                <a class="nav-link" href="#caregiver-info" data-bs-toggle="tab">Caregiver Info</a>
                            </li>
                        @endif
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="overview">
                            @if ($posts->isEmpty())
                                <p class="text-muted">No posts to display.</p>
                            @else
                                @foreach ($posts as $post)
                                    <div class="card mb-3 shadow-sm">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $post->title }}</h5>
                                            <p class="card-text">{{ Str::limit($post->content, 150) }}</p>
                                            <div class="d-flex align-items-center text-muted">
                                                <span class="me-3">⬆️ 1</span>
                                                <span class="me-3">⬇️ 0</span>
                                                <span class="me-3">💬 0</span>
                                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">แก้ไข</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="tab-pane fade" id="posts">
                            <p>Posts tab content here.</p>
                        </div>
                        <div class="tab-pane fade" id="comments">
                            <p>Comments tab content here.</p>
                        </div>
                        <div class="tab-pane fade" id="saved">
                            <p>Saved tab content here.</p>
                        </div>
                        @if ($user->caregiver)
                            <div class="tab-pane fade" id="caregiver-info">
                                <h5>Caregiver Information</h5>
                                <p>Experience: {{ $user->caregiver->experience_years }} years</p>
                                <p>Specialization: {{ $user->caregiver->specialization }}</p>
                                <p>Rating: ★★★★★ ({{ $user->caregiver->rating }})</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Section -->
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <img src="{{ $user->avatar_url }}" alt="User Avatar" class="rounded-circle mb-2" width="80" height="80">
                    <h5>{{ $user->name }}</h5>
                    <p class="text-muted">{{ $user->caregiver ? 'Caregiver' : 'Member' }}</p>
                    @if ($user->caregiver)
                        <p class="text-muted">Rating: ★★★★★ ({{ $user->caregiver->rating }})</p>
                    @endif
                </div>
                <hr>
                <div class="card-body">
                    <p><strong>{{ $posts->count() }}</strong> Posts</p>
                    <p><strong>0</strong> Comments</p>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <h6>About {{ $user->name }}</h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et urna lacus.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

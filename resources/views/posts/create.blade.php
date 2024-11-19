@extends('layouts.app')

@section('title', 'Create Forum')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="p-4 shadow-sm bg-white rounded-3">
                    <h4 class="mb-4 fs-4 text-center fw-bold">Create Forum</h4>
                    <form class="form" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Title -->
                        <div class="form-floating mb-3">
                            <input class="form-control rounded-4" type="text" id="title" name="title" placeholder="Title" required>
                            <label for="title">Title</label>
                        </div>

                        <!-- Content -->
                        <div class="mb-3">
                            <label for="content" class="form-label fw-semibold">Content</label>
                            <textarea class="form-control rounded-4" id="content" name="content" rows="10" placeholder="Write your content here..." required></textarea>
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Image</label>
                            <input class="form-control" type="file" id="image" name="image" accept="image/*">
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary rounded-4 px-4" id="submitBtn" type="submit">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

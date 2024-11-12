@extends('layouts.app')

@section('title', 'Create Forums')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="p-4">
                    <h4 class="mb-4 fs-4">Create Forum</h4>
                    <form class="form" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" oninput="checkForm()">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control rounded-4" type="text" id="title" name="title" placeholder="Title" required>
                            <label for="title">Title</label>
                        </div>
                    
                        <div class="form-floating mb-3">
                            <textarea class="form-control rounded-4" id="content" name="content" placeholder="Content" required style="height: 150px;"></textarea>
                            <label for="content">Content</label>
                        </div>

                        <!-- Input สำหรับการอัปโหลดรูปภาพ -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Image</label>
                            <input class="form-control" type="file" id="image" name="image" accept="image/*">
                        </div>
                    
                        <div class="d-flex justify-content-end">
                            <div class="my-2">
                                <button class="btn btn-primary rounded-4" id="submitBtn" type="submit">Post</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

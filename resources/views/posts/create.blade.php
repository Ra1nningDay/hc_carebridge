@extends('layouts.app')

@section('title', 'Create Forum')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="p-4 shadow-sm bg-white rounded-3">
                    <h4 class="mb-4 fs-4 text-center fw-bold">Create Forum</h4>
                    <form class="form" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" oninput="updateCharCount()">
                        @csrf

                        <!-- Title -->
                        <div class="form-floating mb-3">
                            <input class="form-control rounded-4" type="text" id="title" name="title" placeholder="Title" required>
                            <label for="title">Title</label>
                        </div>

                        <!-- Content with CKEditor -->
                        <div class="mb-3 position-relative">
                            <label for="content" class="form-label fw-semibold">Content</label>
                            <textarea class="form-control rounded-4" style="height: 300px;" id="content" name="content" placeholder="Write your content here..." required></textarea>
                            <small class="text-muted position-absolute end-0 me-2 mt-1" id="char-counter">0 / 500</small>
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

    <!-- CKEditor Script -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'), {
                toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo'],
                wordCount: {
                    onUpdate: stats => {
                        const charCounter = document.getElementById('char-counter');
                        charCounter.textContent = `${stats.characters} / 500`;
                    }
                }
            })
            .catch(error => {
                console.error(error);
            });

            
    </script>

    <!-- Character Counter Script -->
    <script>
        function updateCharCount() {
            const textarea = document.getElementById('content');
            const counter = document.getElementById('char-counter');
            counter.textContent = `${textarea.value.length} / 500`;
        }
    </script>
@endsection

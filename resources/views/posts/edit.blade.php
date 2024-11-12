@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Post</h1>
    
    <!-- Form for updating the post -->
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Title input -->
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
        </div>

        <!-- Body input -->
        <div class="form-group mb-3">
            <label for="body">Body</label>
            <textarea name="content" class="form-control" required>{{ $post->content }}</textarea>
        </div>

        <!-- Image upload -->
        <div class="form-group mb-3">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
            
            <!-- Display current image if exists -->
            @if($post->image)
                <div class="mt-2">
                    <p>Current Image:</p>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid rounded" style="max-width: 200px;">
                </div>

                <!-- Option to remove current image -->
                <div class="form-check mt-2">
                    <input type="checkbox" name="remove_image" class="form-check-input" id="removeImage">
                    <label class="form-check-label" for="removeImage">Remove current image</label>
                </div>
            @endif
        </div>

        <!-- Update button -->
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>

    <!-- Delete form -->
    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="mt-3">
        @csrf
        @method('DELETE')
        
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete Post</button>
    </form>
</div>
@endsection

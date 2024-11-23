<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Caregiver;
use App\Models\Visit;
use App\Models\Comment;
use Illuminate\Http\Request;
use League\CommonMark\CommonMarkConverter;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        $posts = Post::when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('title', 'like', '%' . $query . '%')
                ->orWhere('content', 'like', '%' . $query . '%');
        })->paginate(4);

        return view('posts.index', compact('posts', 'query'));
    }

    public function create()
    {
        return view('posts.create');
    }
    
    public function store(Request $request)
    {
        // Validate the incoming request data, including image
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for image
        ]);
    
        // Handle image upload if present
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Get the file from the request
            $image = $request->file('image');
            // Generate a unique filename
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            // Move the image to the public/uploads/posts directory
            $image->move(public_path('uploads/posts'), $imageName);
            // Set the image path
            $imagePath = 'uploads/posts/' . $imageName;
        }
    
        // Create a new post using the Post model
        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'author_id' => auth()->id(),
            'image' => $imagePath, // Save image path
        ]);
    
        // Redirect or return response
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function show(Post $post)
    {
        // Count comments related to the post
        $commentCount = Comment::where('post_id', $post->id)->count();

        // Convert Markdown content to HTML
        $converter = new CommonMarkConverter();
        $post->content = $converter->convertToHtml($post->content);

        // Pass the converted content and comment count to the view
        return view('posts.show', compact('post', 'commentCount'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // Validate the incoming request data, including image
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check if there's a new image file and handle it
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($post->image && file_exists(public_path($post->image))) {
                unlink(public_path($post->image));
            }
            // Store the new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/posts'), $imageName);
            $post->image = 'uploads/posts/' . $imageName;
        }

        // Update other post details
        $post->title = $request->input('title');
        $post->content = $request->input('content');

        // Save the changes to the database
        $post->save();

        // Redirect with success message
        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        // Delete the post image if it exists
        if ($post->image && file_exists(public_path($post->image))) {
            unlink(public_path($post->image));
        }
        
        // Delete the post
        $post->delete();

        // Redirect or return response
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}

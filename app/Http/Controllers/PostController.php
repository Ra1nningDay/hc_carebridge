<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Caregiver;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function welcome()
    {
        // Fetch posts
        $posts = Post::latest()->take(5)->get();

        $memberCount = User::count();

        $visitCount = Visit::count(); // นับจำนวนการเข้าชมทั้งหมด

        // Fetch caregivers
        $caregivers = Caregiver::with(['user', 'personalInfo'])->take(3)->get();

        return view('welcome', compact('posts', 'caregivers','memberCount','visitCount'));
    }


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
            $imagePath = $request->file('image')->store('images', 'public');
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
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // Debug to check if data is received correctly
        // dd($request->all()); // Uncomment to check form data during testing

        // Validate the incoming request data, including image
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check if there's a new image file and handle it
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            // Store the new image and assign path to the model
            $post->image = $request->file('image')->store('images', 'public');
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
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        
        // Delete the post
        $post->delete();

        // Redirect or return response
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Caregiver;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
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
}

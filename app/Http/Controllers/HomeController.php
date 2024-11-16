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

        // Count members
        $memberCount = User::count();

        // Count visits
        $visitCount = Visit::count(); // นับจำนวนการเข้าชมทั้งหมด

        // Fetch caregivers
        $caregivers = Caregiver::with(['user', 'personalInfo'])->take(3)->get();

        // Fetch the logged-in user
        $user = auth()->user(); // ดึงข้อมูลผู้ใช้ที่ล็อกอิน (ถ้ามี)

        return view('welcome', compact('posts', 'caregivers', 'memberCount', 'visitCount', 'user'));
    }

}

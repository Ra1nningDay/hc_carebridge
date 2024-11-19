<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Caregiver;
use App\Models\Visit;
use App\Models\Comment;

class DashboardController extends Controller
{
    public function index()
    {   
        // ดึงข้อมูลจำนวนทั้งหมดจากฐานข้อมูล
        $postCount = Post::count(); // จำนวนกระทู้
        $userCount = User::count(); // จำนวนผู้ใช้งาน
        $caregiverCount = Caregiver::count(); // จำนวนผู้ดูแล
        $visitCount = Visit::count(); // จำนวนการเข้าช
        $commentCount = Comment::count(); // จำนวนการคอมเมนต์

        // ส่งตัวแปรทั้งหมดไปยัง View
        return view('dashboard.dashboard', compact('postCount', 'userCount', 'caregiverCount', 'visitCount','commentCount'));
    }
}



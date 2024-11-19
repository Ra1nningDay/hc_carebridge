<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Caregiver;
use App\Models\Visit;

class DashboardController extends Controller
{
    public function index()
    {   
        $postCount = Post::Count();
        $userCount = User::Count();
        $caregiverCount = Caregiver::Count();
        $visitCount = Visit::Count();
        return view('dashboard.dashboard', compact('postCount','userCount','caregiverCount','visitCount')); // Ensure this view exists
    }
}


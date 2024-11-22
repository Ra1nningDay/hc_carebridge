<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Caregiver;
use App\Models\Visit;
use App\Models\EvaluationTopic; 
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function welcome()
    {   
        // Fetch posts
        $posts = Post::latest()->take(5)->get();

        // Count members
        $memberCount = User::count();

        // Count visits
        $visitCount = Visit::count();

        // Fetch caregivers
        $caregivers = Caregiver::with(['user', 'personalInfo'])->take(3)->get();

        // Fetch all evaluation topics (เหมือนใน EvaluationController)
        $evaluationTopics = EvaluationTopic::whereDoesntHave('ratings', function ($query) {
            $query->where('user_id', auth()->id());
        })->inRandomOrder()->take(1)->get();

        // Pass all variables to the view
        return view('welcome', compact('posts', 'caregivers', 'memberCount', 'visitCount', 'evaluationTopics'));
    }
}

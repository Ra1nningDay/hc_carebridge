<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\EvaluationTopic;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|array',
            'rating.*' => 'required|integer|min:1|max:5', // ตรวจสอบคะแนนให้อยู่ระหว่าง 1-5
            'feedback' => 'nullable|array',
            'feedback.*' => 'nullable|string',
        ]);

        foreach ($request->rating as $topicId => $stars) {
            Rating::create([
                'evaluation_topic_id' => $topicId,
                'stars' => $stars,
                'feedback' => $request->feedback[$topicId] ?? null,
                'user_id' => auth()->id(),
            ]);
        }

        return redirect()->route('welcome')->with('success', 'Thank you for your feedback!');
    }
}


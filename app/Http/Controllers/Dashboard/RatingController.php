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
        // ตรวจสอบว่าผู้ใช้งานได้ล็อกอินหรือไม่
        if (!auth()->check()) {
            return back()->with('error', 'คุณต้องเข้าสู่ระบบก่อนส่งแบบประเมิน');
        }

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

    public function update(Request $request)
    {
        $request->validate([
            'rating' => 'required|array',
            'rating.*' => 'required|integer|min:1|max:5',
            'feedback' => 'nullable|array',
            'feedback.*' => 'nullable|string',
        ]);

        foreach ($request->rating as $topicId => $stars) {
            $rating = Rating::where('evaluation_topic_id', $topicId)
                ->where('user_id', auth()->id())
                ->first();

            if ($rating) {
                // อัปเดตคะแนนและความคิดเห็น
                $rating->update([
                    'stars' => $stars,
                    'feedback' => $request->feedback[$topicId] ?? null,
                ]);
            } else {
                // เพิ่มการประเมินใหม่ในกรณีที่ยังไม่มี
                Rating::create([
                    'evaluation_topic_id' => $topicId,
                    'stars' => $stars,
                    'feedback' => $request->feedback[$topicId] ?? null,
                    'user_id' => auth()->id(),
                ]);
            }
        }

        return redirect()->route('welcome')->with('success', 'อัปเดตความคิดเห็นสำเร็จ!');
    }

}


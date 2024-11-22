<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Question;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        $assessments = Assessment::all();
        return view('dashboard.survey.index', compact('assessments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Assessment::create($request->only('name', 'description'));

        return redirect()->route('survey.index')->with('success', 'หัวข้อแบบประเมินถูกเพิ่มเรียบร้อยแล้ว!');
    }

    public function questions($id)
    {
        $assessment = Assessment::with('questions')->findOrFail($id);
        return view('dashboard.survey.questions', compact('assessment'));
    }

    public function storeQuestion(Request $request, $id)
    {
        $request->validate([
            'question_text' => 'required|string',
            'question_type' => 'required|string|in:text,select,radio',
            'options' => 'nullable|string',
        ]);

        Question::create([
            'assessment_id' => $id,
            'question_text' => $request->question_text,
            'question_type' => $request->question_type,
            'options' => $request->options ? json_encode(explode(',', $request->options)) : null,
        ]);

        return redirect()->route('survey.index')->with('success', 'คำถามถูกเพิ่มเรียบร้อยแล้ว!');
    }

    public function destroyQuestion($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('survey.index')->with('success', 'คำถามถูกลบเรียบร้อยแล้ว!');
    }

    
}


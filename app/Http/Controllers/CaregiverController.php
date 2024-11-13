<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caregiver;

class CaregiverController extends Controller
{
    public function showApplicationForm()
    {
        $currentStep = 1;
        return view('caregiver.register.register', compact('currentStep'));
    }

    public function submitApplication(Request $request)
    {
        // ตรวจสอบและประมวลผลข้อมูล
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'specialization' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'rating' => 'nullable|numeric|min:0|max:5',
            'experience_years' => 'required|integer',
        ]);

        // บันทึกข้อมูลลงในฐานข้อมูล
        Caregiver::create($request->all());

        // กำหนดขั้นตอนการสมัครเป็น 2
        $currentStep = 2;

        // ส่งข้อมูลกลับไปยังหน้าแสดงความคืบหน้า
        return redirect()->route('caregiver.register')->with('currentStep', $currentStep);
    }
}


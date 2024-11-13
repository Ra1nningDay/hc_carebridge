<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caregiver;

class CaregiverController extends Controller
{
    public function index()
    {
        $caregivers = Caregiver::all();
        return view('dashboard.caregiver-management', compact('caregivers'));
    }

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

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,Approved,Rejected',
        ]);

        // ค้นหา caregiver ตาม id และอัปเดตสถานะ
        $caregiver = Caregiver::findOrFail($id);
        $caregiver->status = $request->status;
        $caregiver->save();

        return redirect()->route('dashboard.caregiver-management')->with('status', 'Caregiver status updated successfully!');
    }

}


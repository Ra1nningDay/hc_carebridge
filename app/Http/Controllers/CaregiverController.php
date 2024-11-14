<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caregiver;

class CaregiverController extends Controller
{
    public function showProfile($id)
    {
        // โหลดข้อมูล Caregiver พร้อมกับ User, PersonalInfo และ Posts
        $caregiver = Caregiver::with(['user.personalInfo', 'user.posts'])->findOrFail($id);

        // ตรวจสอบว่ากำลังดูโปรไฟล์ของตัวเองหรือไม่
        $isOwnProfile = auth()->check() && auth()->id() == $caregiver->user->id;

        return view('profile.index', [
            'caregiver' => $caregiver,
            'user' => $caregiver->user,
            'personalInfo' => $caregiver->user->personalInfo,
            'posts' => $caregiver->user->posts->sortByDesc('created_at'), // เรียงโพสต์จากล่าสุด
            'isOwnProfile' => $isOwnProfile,
        ]);
    }


    public function showFindCaregiver()
    {
        $caregivers = Caregiver::all();
        return view('caregiver.find_caregiver', compact('caregivers'));
    }

    public function showDashboardCaregiverManagement()
    {
        $caregivers = Caregiver::all();
        return view('dashboard.caregiver-management', compact('caregivers'));
    }


    public function showApplicationForm()
    {
        $userId = auth()->user()->id;
        
        $existingApplication = Caregiver::where('user_id', $userId)->first();
        
        if ($existingApplication) {
            if ($existingApplication->application_step == 2) {
                return redirect()->route('caregiver.awaitReview');
            } elseif ($existingApplication->application_step >= 3) {
                return redirect()->route('caregiver.confirmStatus');
            }
        }

        $currentStep = 1;
        return view('caregiver.register.register', compact('currentStep'));
    }

    public function submitApplication(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'specialization' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'experience_years' => 'required|integer',
        ]);

        $existingApplication = Caregiver::where('user_id', $request->user_id)
            ->whereIn('status', ['Pending', 'Under Review'])
            ->first();

        if ($existingApplication) {
            return redirect()->route('caregiver.awaitReview')
                ->with('message', 'Your application is already under review or pending approval.');
        }

        $caregiver = Caregiver::create([
            'user_id' => $request->user_id,
            'specialization' => $request->specialization,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'experience_years' => $request->experience_years,
            'status' => 'Pending',
            'application_step' => 2,
        ]);

        $caregiver->applicationSteps()->create([
            'step_number' => 2,
            'status' => 'Submitted',
            'completed_at' => now(),
        ]);

        return redirect()->route('caregiver.awaitReview')
            ->with('message', 'Your application has been submitted and is pending review.');
    }

    public function awaitReview()
    {
        $caregiver = Caregiver::where('user_id', auth()->id())->first();

        if ($caregiver && $caregiver->application_step == 2) {
            return view('caregiver.register.await_review');
        }

        return redirect()->route('caregiver.register');
    }

    public function confirmStatus()
    {
        $caregiver = Caregiver::where('user_id', auth()->id())->first();

        if ($caregiver->application_step < 3) {
            return redirect()->route('caregiver.awaitReview');
        }

        return view('caregiver.register.confirm_status')->with('status', $caregiver->status);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,Approved,Rejected',
        ]);

        $caregiver = Caregiver::findOrFail($id);
        $caregiver->status = $request->status;

        if ($request->status === 'Approved' || $request->status === 'Rejected') {
            $caregiver->update(['application_step' => 4]);
        }

        $caregiver->save();

        $step_number = $caregiver->applicationSteps()->count() + 1;
        $caregiver->applicationSteps()->create([
            'step_number' => $step_number,
            'status' => $request->status,
            'completed_at' => now(),
        ]);

        return redirect()->route('dashboard.caregiver-management')->with('status', 'Caregiver status updated successfully!');
    }
}

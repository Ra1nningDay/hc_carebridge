<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\UserPersonalInfo;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        $personalInfo = $user->personalInfo; // ดึงข้อมูลส่วนตัวเพิ่มเติม

        return view('profile.edit', [
            'user' => $user,
            'personalInfo' => $personalInfo,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update the user's additional personal information.
     */
    public function updatePersonalInfo(Request $request): RedirectResponse
    {
        $user = $request->user();

        $data = $request->validate([
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'medical_history' => 'nullable|string',
            'allergies' => 'nullable|string',
            'medications' => 'nullable|string',
            'care_type' => 'nullable|string|max:50',
            'preferred_time' => 'nullable|string|max:50',
        ]);

        $personalInfo = $user->personalInfo ?: new UserPersonalInfo(['user_id' => $user->id]);
        $personalInfo->fill($data);
        $personalInfo->save();

        return Redirect::route('profile.edit')->with('status', 'personal-info-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function showPosts(User $user)
    {
        // ดึงโพสต์ของผู้ใช้ที่ระบุ
        $posts = $user->posts()->latest()->get();

        return view('profile.posts', compact('user', 'posts'));
    }
}

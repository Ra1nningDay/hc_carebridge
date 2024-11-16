<?php 

use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\CaregiverController;
use App\Http\Middleware\AdminOnly;
use Illuminate\Support\Facades\Route;

// Admin Dashboard Routes
Route::middleware(['auth', 'verified', AdminOnly::class])->group(function () {
    // Dashboard Home
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    })->name('dashboard');

    // Caregiver Management
    Route::get('/dashboard/caregiver-management', [CaregiverController::class, 'index'])->name('dashboard.caregiver-management');
    Route::patch('/caregivers/{id}/update-status', [CaregiverController::class, 'updateStatus'])->name('caregivers.updateStatus');

    // User Management
    Route::get('/dashboard/user-management', [UserManagementController::class, 'index'])->name('dashboard.user-management');
    Route::patch('/dashboard/user-management/{id}', [UserManagementController::class, 'update'])->name('dashboard.user-management.update');
});


<?php 

use App\Http\Controllers\CaregiverController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminOnly;

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth', 'verified', AdminOnly::class])->name('dashboard');

// Caregiver Management
Route::middleware(['auth', 'verified', AdminOnly::class])->group(function () {
    Route::get('/dashboard/caregiver-management', [CaregiverController::class, 'index'])->name('dashboard.caregiver-management');
    Route::patch('/caregivers/{id}/update-status', [CaregiverController::class, 'updateStatus'])->name('caregivers.updateStatus');
});

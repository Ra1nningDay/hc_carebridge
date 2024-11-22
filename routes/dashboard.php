<?php 

use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\CaregiverController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\AdminOnly;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\EvaluationController;

// Admin Dashboard Routes
Route::middleware(['auth', 'verified', AdminOnly::class])->group(function () {
    // Dashboard Home - เปลี่ยนให้ใช้ DashboardController
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Caregiver Management
    Route::get('/dashboard/caregiver-management', [CaregiverController::class, 'index'])->name('dashboard.caregiver-management');
    Route::patch('/caregivers/{id}/update-status', [CaregiverController::class, 'updateStatus'])->name('caregivers.updateStatus');

    // User Management
    Route::get('/dashboard/user-management', [UserManagementController::class, 'index'])->name('dashboard.user-management');
    Route::patch('/dashboard/user-management/{id}', [UserManagementController::class, 'update'])->name('dashboard.user-management.update');

    //Evaluation
    Route::get('/dashboard/evaluations', [EvaluationController::class, 'index'])->name('evaluations.index');
    Route::post('/dashboard/evaluations', [EvaluationController::class, 'store'])->name('evaluations.store');
    Route::get('/evaluations/{id}/edit', [EvaluationController::class, 'edit'])->name('evaluations.edit');
    Route::put('/evaluations/{id}', [EvaluationController::class, 'update'])->name('evaluations.update');
    Route::delete('/dashboard/evaluations/{evaluationTopic}', [EvaluationController::class, 'destroy'])->name('evaluations.destroy');
});



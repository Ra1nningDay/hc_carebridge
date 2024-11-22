<?php 
use App\Http\Controllers\Survey\AssessmentController;

// Dashboard Page
Route::get('/survey', [AssessmentController::class, 'index'])->name('survey.list');

Route::get('/survey/{id}', [AssessmentController::class, 'show'])->name('survey.show');
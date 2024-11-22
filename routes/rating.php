<?php 

use App\Http\Controllers\Dashboard\RatingController;

Route::post('/submit-rating', [RatingController::class, 'store'])->name('ratings.store');
Route::put('/submit-update', [RatingController::class, 'update'])->name('ratings.update');
<?php 

use App\Http\Controllers\Dashboard\RatingController;

Route::post('/submit-rating', [RatingController::class, 'store'])->name('ratings.store');
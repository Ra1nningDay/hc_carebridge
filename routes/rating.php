<?php 

use App\Http\Controllers\Dashboard\RatingController;

Route::post('/ratings', [RatingController::class, 'store'])->name('ratings.show');
Route::post('/submit-rating', [RatingController::class, 'store'])->name('ratings.store');
Route::put('/submit-update', [RatingController::class, 'update'])->name('ratings.update');
Route::delete('/ratings/{id}', [RatingController::class, 'destroy'])->name('ratings.destroy');

<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminOnly;

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth', 'verified', AdminOnly::class])->name('dashboard');


//Caregiver
Route::get('/dashboard/caregiver', function () {
    return view('dashboard.caregiver-management');
})->middleware(['auth', 'verified', AdminOnly::class])->name('dashboard.caregiver');

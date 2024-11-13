<?php 
    use Illuminate\Support\Facades\Route;

    Route::get('caregiver', function () {
        return view('caregiver.find_caregiver');
    })->name('caregiver');
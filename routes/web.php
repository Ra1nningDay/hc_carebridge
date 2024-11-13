<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


require __DIR__.'/auth.php';
require __DIR__.'/profile.php';
require __DIR__.'/posts.php';
require __DIR__.'/caregiver.php';
require __DIR__.'/dashboard.php';
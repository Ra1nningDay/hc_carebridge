<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


require __DIR__.'/auth.php';
require __DIR__.'/profile.php';
require __DIR__.'/posts.php';
require __DIR__.'/caregiver.php';
require __DIR__.'/dashboard.php';
require __DIR__.'/chatbot.php';



Route::get('lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'th'])) {
        abort(400);
    }
    session(['locale' => $locale]);
    app()->setLocale($locale);
    return redirect()->back();
});



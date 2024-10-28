<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

// Index page
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::post('/', [IndexController::class, 'store'])->name('index');

Route::prefix('public')->group(function () {

    // About page
    Route::get('about', function () {
        return view('public/about');
    })->name('about');

    // Contact's page
    Route::get('contacts', function () {
        return view('public/contacts');
    })->name('contacts');

    // Support's page
    Route::get('support', function () {
        return view('public/support');
    })->name('support');

    // Create user page
    Route::get('signup', function () {
        return view('public/signup');
    })->name('signup');
});

// The last one
Route::fallback(function () {
    return view('landing');
});

// Route::get('/', function () {
//     return view('landing');
// })->name('index');

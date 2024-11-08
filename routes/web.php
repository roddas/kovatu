<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilizadorController;


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

    // Support's p
    // Index page
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::post('/', [IndexController::class, 'store'])->name('index');

    // About page
    Route::get('/public/about', function () {
        return view('public/about');
    })->name('about');

    // Contact's page
    Route::get('/public/contacts', function () {
        return view('public/contacts');
    })->name('contacts');

    // Support's page
    Route::get('/public/support', function () {
        return view('public/support');
    })->name('support');

    // The last one
    Route::fallback(function () {
        return view('landing');
    });

    Route::get('support', function () {
        return view('public/support');
    })->name('support');

    // Create user page view
    Route::get('signup', function () {
        return view('public/signup');
    })->name('signup');

    Route::post('signup', [UtilizadorController::class, 'store'])->name('signup');
});

// The last one
Route::fallback(function () {
    return view('landing');
});

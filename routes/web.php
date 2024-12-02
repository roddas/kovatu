<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\QuotesController;
use App\Http\Controllers\UtilizadorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Index page
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::post('/', [IndexController::class, 'login'])->name('index');

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

    // Create user page view
    Route::get('signup', function () {

        if (Auth::check()) {
            return redirect('/home');
        }

        return view('public/signup');
    })->name('signup');

    Route::post('signup', [UtilizadorController::class, 'store'])->name('signup');
});

// After the login
Route::prefix('home')->group(function () {

    // Home's page
    Route::get('/', function () {
        return view('home.home');
    })->name('home');

    // Quote's page
    Route::get('proverbio', [QuotesController::class, 'index'])->name('proverbio');

    // Fake routes
    Route::get('dicionario', [QuotesController::class, 'index'])->name('dicionario');
    Route::get('gramatica', [QuotesController::class, 'index'])->name('gramatica');
    Route::get('suporte', [QuotesController::class, 'index'])->name('suporte');
    Route::get('sobre', [QuotesController::class, 'index'])->name('sobre');
    Route::get('forum', [QuotesController::class, 'index'])->name('forum');



    Route::post('logout', [UtilizadorController::class, 'logout'])->name('logout');
});

// The last one
Route::fallback(function () {
    return view('landing');
});

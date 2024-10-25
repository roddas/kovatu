<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('landing');
// })->name('index');

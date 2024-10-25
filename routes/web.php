<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

// Index page
Route::get('/', [IndexController::class,'index'])->name('index');
Route::post('/', [IndexController::class,'store'])->name('index');

// About page
Route::get('/public/about', function(){
    return view('public/about');
})->name('about');

// Route::get('/', function () {
//     return view('landing');
// })->name('index');

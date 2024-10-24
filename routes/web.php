<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

// Index page
Route::get('/', [IndexController::class,'index'])->name('index');
Route::post('/', [IndexController::class,'store'])->name('index');


// Route::get('/', function () {
//     return view('landing');
// })->name('index');

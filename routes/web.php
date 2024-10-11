<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::resource('/', IndexController::class);

Route::get('/', function () {
    return view('landing');
})->name('index');

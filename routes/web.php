<?php

use App\Http\Controllers\NewsCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/news-categories', NewsCategoryController::class);

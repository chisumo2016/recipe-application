<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/recipes' , \App\Http\Controllers\RecipeController::class);
Route::resource('/categories' , \App\Http\Controllers\CategoryController::class);

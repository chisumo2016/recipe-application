<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use Database\Factories\CategoryFactory;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $users = \App\Models\User::count();
    $recipes = \App\Models\Recipe::count();
    $categories = \App\Models\Category::count();
    return view('dashboard' ,compact('users', 'recipes', 'categories'));
})->middleware(['admin','auth', 'verified'])->name('dashboard');

Route::get('/user/dashboard', function () {

    $recipes = \App\Models\Recipe::with('category')->get();

    return view('user.dashboard' ,compact('recipes'));
})->middleware(['user','auth', 'verified'])->name('user.dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


    Route::resource('categories', CategoryController::class);
    Route::resource('recipes', RecipeController::class);


require __DIR__.'/auth.php';



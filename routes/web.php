<?php

use App\Http\Controllers\Management\CategoryController;
use App\Http\Controllers\Management\MenuController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Management\TableController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/management', function () {
    return view('management.index');
});

Route::resource('management/category', CategoryController::class);

Route::resource('management/menu', MenuController::class);

Route::resource('management/table', TableController::class);

require __DIR__.'/auth.php';

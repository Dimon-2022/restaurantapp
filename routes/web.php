<?php

use App\Http\Controllers\Cashier\CashierController;
use App\Http\Controllers\Management\CategoryController;
use App\Http\Controllers\Management\MenuController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Management\TableController;


Route::get('/', function () {
    return view('home');
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

Route::get('/cashier', [CashierController::class, 'index'])->name('cashier.index');

Route::get('/cashier/getTable', [CashierController::class, 'getTables']);

Route::get("/cashier/getSaleDetailsByTable/{table_id}", [CashierController::class, 'getSaleDetailsByTable'])->name('cashier.getSaleDetailsByTable');

Route::post('/cashier/orderFood', [CashierController::class, 'orderFood'])->name('cashier.orderFood');

Route::get('/cashier/getMenuByCategory/{category_id}', [CashierController::class, 'getMenuByCategory'])->name('cashier.getMenuByCategory');



require __DIR__.'/auth.php';

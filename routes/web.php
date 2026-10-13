<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\FlowerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;

// Open the admin dashboard directly without a login page.
Route::redirect('/', '/admin');
Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('suppliers', SupplierController::class)->except(['show']);
    Route::resource('flowers', FlowerController::class)->except(['show']);
    Route::resource('customers', CustomerController::class)->except(['show']);
    Route::resource('orders', OrderController::class)->except(['show']);
});

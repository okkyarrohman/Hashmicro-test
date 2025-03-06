<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'manageUsers'])->name('admin.users');

    Route::resource('products', ProductController::class);
});

// Route group untuk Customer
Route::middleware(['auth', 'role:customer'])->prefix('customer')->group(function () {
    Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('order.show');
    Route::post('/orders', [OrderController::class, 'store'])->name('order.store');
});

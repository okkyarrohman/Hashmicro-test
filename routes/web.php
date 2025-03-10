<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\TransactionController as CustomerTransactionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/character', [CharacterController::class, 'index'])->name('character.index');
Route::post('/character', [CharacterController::class, 'store'])->name('character.store');


Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'manageUsers'])->name('admin.users');
    Route::get('/products/exportPdf', [ProductController::class, 'exportPdf'])->name('products.exportPdf');


    Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction-admin.index');

    Route::resource('products', ProductController::class);
});

// Route group untuk Customer
Route::middleware(['auth'])->prefix('customer')->group(function () {
    Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
    Route::post('/orders', [OrderController::class, 'store'])->name('order.store');

    Route::get('/transaction', [CustomerTransactionController::class, 'index'])->name('transaction.index');
});

Route::get('/customer/orders/{id}', [OrderController::class, 'show'])->name('order.show');
Route::get('/customer/orders/{id}/exportPdf', [OrderController::class, 'exportPdf'])->name('order.exportPdf');

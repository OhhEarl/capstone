<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Admin Routes
Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.home');
});

// Manager Routes
Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/manager/dashboard', [ManagerController::class, 'index'])->name('manager.home');
});

// Cashier Routes
Route::middleware(['auth', 'role:3'])->group(function () {
    Route::get('/cashier/dashboard', [CashierController::class, 'index'])->name('cashier.home');
});

// Parent Routes
Route::middleware(['auth', 'role:4'])->group(function () {
    Route::get('/parent/dashboard', [ParentController::class, 'index'])->name('parent.home');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    // Register
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'registerSave'])->name('register.save');

    // Login
    Route::get('login', [AuthController::class, 'login'])->name('login');

    Route::post('login', [AuthController::class, 'loginAction'])->name('login.action');
});

// Logout
Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});


Route::controller(ProductController::class)->prefix('products')->group(function () {
    Route::get('', 'index')->name('products');
    Route::get('create', 'create')->name('products.create');
    Route::post('store', 'store')->name('products.store');
    Route::get('show/{id}', 'show')->name('products.show');
    Route::get('edit/{id}', 'edit')->name('products.edit');
    Route::put('edit/{id}', 'update')->name('products.update');
    Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AssignController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

// Authentication routes
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes that require authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])-> name('dashboard'); 


    // User routes
    Route::get('/add', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/alluser', [UserController::class, 'all'])->name('user.all');
    Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::post('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
    Route::get('/user/search', [UserController::class, 'search'])->name('user.search');

    // Product routes
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/allproduct', [ProductController::class, 'all'])->name('product.all');
    Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::post('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    Route::get('/product/search', [AssignController::class, 'search'])->name('product.search');
    Route::get('/products/download/{product}', [AssignController::class, 'Document'])->name('product.download');
    Route::get('/products/download', [AssignController::class, 'download'])->name('products.download');

    // Assign routes
    Route::get('/assign/allassign', [AssignController::class, 'all'])->name('assign.all');
    Route::get('/assign/history', [AssignController::class, 'history'])->name('assign.history');
    Route::get('/assign/create', [AssignController::class, 'create'])->name('assign.create');
    Route::post('/assign/store', [AssignController::class, 'store'])->name('assign.store');
    Route::post('/assign/available', [AssignController::class, 'available'])->name('assign.available');
    Route::get('/assign/show/{id}', [AssignController::class, 'show'])->name('assign.show');
    Route::get('/assign/edit/{id}', [AssignController::class, 'edit'])->name('assign.edit');
    Route::post('/assign/update/{id}', [AssignController::class, 'update'])->name('assign.update');
    Route::post('/assign/delete/{id}', [AssignController::class, 'destroy'])->name('assign.delete');


    // Shift routes
    Route::get('/shift/create', [ShiftController::class, 'create'])->name('shift.create');
    Route::post('/shift/store', [ShifttController::class, 'store'])->name('shift.store');
    Route::get('/shift/allproduct', [ShiftController::class, 'all'])->name('shift.all');
    Route::get('/shift/show/{id}', [ShiftController::class, 'show'])->name('shift.show');
    Route::get('/shift/edit/{id}', [ShifttController::class, 'edit'])->name('shift.edit');
    Route::post('/shift/update/{id}', [ShiftController::class, 'update'])->name('shift.update');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KaryawanController;

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
    return view('dashboard');
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

// Admin
Route::get('/admin', function () {
    return view('dashboard');
});

// Customer
Route::get('/customer', function () {
    return view('dashboard');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix'=>'auth'], function ($router) {
    Route::get('/register', [AuthController::class, 'viewregister']);
    Route::post('/postregister', [AuthController::class, 'register'])->name('register.post');
    Route::get('/login', [AuthController::class, 'viewlogin'])->name('login');
    Route::post('/postlogin', [AuthController::class, 'login'])->name('login.post');
    Route::get('/profile', [AuthController::class, 'profile'])->middleware('auth');
    Route::get('/change-profile', [AuthController::class, 'changeprofile'])->name('changeprofile')->middleware('auth');
    Route::post('/update-profile', [AuthController::class, 'updateprofile'])->name('updateprofile')->middleware('auth');
});

// check Role User
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['login:admin']], function () {
        Route::get('admin', [AdminController::class, 'index'])->name('admin');
    });
    Route::group(['middleware' => ['login:karyawan']], function () {
        Route::get('karyawan', [KaryawanController::class, 'index'])->name('karyawan');
    });
    Route::group(['middleware' => ['login:customer']], function () {
        Route::get('customer', [CustomerController::class, 'index'])->name('customer');
    });
});
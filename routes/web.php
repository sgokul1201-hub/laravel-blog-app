<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;

Route::get('/', [BlogController::class, 'home'])->name('home');

// Auth Routes
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'loginview'])->name('login');
Route::get('/register', [AuthController::class, 'registerview'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/admin', [BlogController::class, 'admin'])->name('admin');
    Route::get('/admin/create', [BlogController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [BlogController::class, 'store'])->name('admin.store');
    Route::get('/admin/edit/{id}', [BlogController::class, 'edit'])->name('admin.edit');
    Route::post('/admin/update/{id}', [BlogController::class, 'update'])->name('admin.update');
    Route::get('/admin/delete/{id}', [BlogController::class, 'delete'])->name('admin.delete');
});

// Blog Details
Route::get('/post/{id}', [BlogController::class, 'show'])->name('post.show');

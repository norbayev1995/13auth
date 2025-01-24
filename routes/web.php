<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'dashboard'])->name('dashboard');

Route::get('/loginPage', [UserController::class, 'loginPage'])->name('loginPage');
Route::get('/registerPage', [UserController::class, 'registerPage'])->name('registerPage');
Route::post('register', [UserController::class, 'register'])->name('register');
Route::post('login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/editPage', [UserController::class, 'editPage'])->name('editPage');
Route::put('user/update/{id}', [UserController::class, 'update'])->name('user.update');

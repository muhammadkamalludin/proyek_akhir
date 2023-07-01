<?php

use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\dosenController;

use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::resource('mahasiswa', mahasiswaController::class);
Route::resource('dosen', dosenController::class);

Route::get('register', [userController::class, 'register'])->name('register');
Route::post('register', [userController::class, 'register_action'])->name('register.action');
Route::get('login', [userController::class, 'login'])->name('login');
Route::post('login', [userController::class, 'login_action'])->name('login.action');
Route::get('password', [userController::class, 'password'])->name('password');
Route::post('password', [userController::class, 'password_action'])->name('password.action');
Route::get('logout', [userController::class, 'logout'])->name('logout');
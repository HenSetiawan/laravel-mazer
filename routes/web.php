<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('guest')->group(function() {
    Route::get('/login',[LoginController::class,'index']);
    Route::post('/login',[LoginController::class,'login'])->name('login');
});

Route::middleware('auth')->group(function() {
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/admin',[AdminController::class,'index'])->name('admin');
    Route::get('/tambah-admin',[AdminController::class,'createForm'])->name('createForm-admin');
    Route::post('/tambah-admin',[AdminController::class,'create'])->name('create-admin');
    Route::get('/ubah-admin/{id}',[AdminController::class,'updateForm'])->name('updateForm-admin');
    Route::post('/ubah-admin',[AdminController::class,'update'])->name('update-admin');
    Route::delete('/admin/{id}',[AdminController::class,'delete']);
    Route::get('/admin-excel',[AdminController::class,'excel'])->name('admin-excel');
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
});


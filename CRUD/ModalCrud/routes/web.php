<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ModalCrudController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'auth'], function (){
    Route::get('/login', [AuthController::class,'loginLayout'])->name('loginLayout')->middleware('isLogin');
    Route::post('/login', [AuthController::class,'login'])->name('login');
    Route::get('/register', [AuthController::class,'registerLayout'])->name('registerLayout');
    Route::post('/register', [AuthController::class,'register'])->name('register');
});

Route::group(['middleware' => 'auth'], function (){
    Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');

    // modal crud
    Route::resource('modalcrud', ModalCrudController::class);

    // auth
    Route::post('/logout', [AuthController::class,'logout'])->name('logout');
});


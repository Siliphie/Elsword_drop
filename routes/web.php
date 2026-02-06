<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemDropRateController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware('guest')->group(function () {
   
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::get('/register', function(){
        return view('auth.register');
    })->name('register');

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/drops/create', [ItemDropRateController::class, 'create'])->name('drops.create');
    Route::post('/drops', [ItemDropRateController::class, 'store'])->name('drops.store');
    Route::get('/my-drops', [ItemDropRateController::class, 'index'])->name('drops.index');
    Route::delete('/drops/{id}', [ItemDropRateController::class, 'destroy'])->name('drops.destroy');
    Route::get('/admin/drops', [ItemDropRateController::class, 'adminIndex'])->name('admin.drops.index');
    });

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', function () {
    return view('auth.login');
})-> name('login');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/logout', function (){
    return view('auth.logout');
})->name('logout');

Route::get('/register', function(){
    return view('auth.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
<?php

use Illuminate\Support\Facades\Route;

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
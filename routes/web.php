<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/create-account', function () {
    return view('create-account');
})->name('create-account');

Route::post('/create-account', function () {
    return 'validação e inserção do usuário!';
})->name('insert-account');


Route::get('/login', function () {
    return view('login');
})->name('login');

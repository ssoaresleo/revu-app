<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/criar-conta', function () {
    return view('create-account');
})->name('create-account');

Route::get('/entrar', function () {
    return view('login')->name('login');
});

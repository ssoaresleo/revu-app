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

Route::post('/login', function () {
    return 'Autenticação do usuário';
})->name('auth');

// Route::get('/user-preferences', function () {
//     return view('preferences');
// })->name('preferences-edit');

// Route::post('/user-preferences', function () {
//     return 'Inserir preferencias do usuário';
// })->name('preferences-update');

Route::prefix('create-account')->name('create-account.')->group(function () {
    Route::get('/', fn() => view('create-account.signup-form'))->name('index');
    Route::post('/', fn() => redirect()->route('create-account.select-genres'));

    Route::get('select-genres', fn() => view('create-account.select-genres'))->name('select-genres');
    Route::post('select-genres', fn() => redirect()->route('create-account.profile-settings'));

    Route::get('profile-settings', fn() => view('create-account.profile-settings'))->name('profile-settings');
    Route::post('profile-settings', fn() => redirect()->route('create-account.profile-complete'));
    Route::get('complete', fn() => view('create-account.complete'))->name('profile-complete');
});

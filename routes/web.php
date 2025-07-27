<?php

use App\Http\Controllers\AccountCreationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::prefix('register')->name('register.')->group(function () {
    Route::get('/', [AccountCreationController::class, 'showAccountForm'])->name('index');
    Route::post('/', [AccountCreationController::class, 'handleAccountForm']);

    Route::get('select-genres', [AccountCreationController::class, 'showSelectGenresForm'])->name('select-genres');
    Route::post('select-genres', [AccountCreationController::class, 'handleSelectGenresForm']);

    Route::get('profile-settings', [AccountCreationController::class, 'showProfileSettingsForm'])->name('profile-settings');
    Route::post('profile-settings', [AccountCreationController::class, 'handleProfileSettingsForm']);
    Route::get('complete', fn() => view('register.complete'))->name('profile-complete');
});

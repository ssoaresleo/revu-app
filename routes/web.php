<?php

use App\Http\Controllers\AccountCreationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [AuthController::class, 'index'])->name('login');

Route::middleware(['throttle:authenticate'])->group(function () {
    Route::post('/login', [AuthController::class, 'authenticate'])->name('auth');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/feed', [FeedController::class, 'index'])->name('feed');
    Route::post('/feed/status', [FeedController::class, 'storeStatus'])->name('feed.status.store');
    Route::patch('/feed/status/{id}', [FeedController::class, 'updateStatus'])->name('feed.status');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::prefix('register')->name('register.')->group(function () {
    Route::get('/', [AccountCreationController::class, 'showAccountForm'])->name('index');
    Route::post('/', [AccountCreationController::class, 'handleAccountForm']);

    Route::get('select-genres', [AccountCreationController::class, 'showSelectGenresForm'])->name('select-genres');
    Route::post('select-genres', [AccountCreationController::class, 'handleSelectGenresForm']);

    Route::get('profile-settings', [AccountCreationController::class, 'showProfileSettingsForm'])->name('profile-settings');
    Route::post('profile-settings', [AccountCreationController::class, 'handleProfileSettingsForm']);

    Route::get('finalize', [AccountCreationController::class, 'finalizeAccountCreation'])->name('finalize');

    Route::get('success', fn() => view('register.success'))->name('success');
});

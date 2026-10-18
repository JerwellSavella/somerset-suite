<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\SsoLaunchController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('security', [SecurityController::class, 'edit'])->name('security.edit');
    Route::put('security', [SecurityController::class, 'update'])->name('security.update');

    Route::get('sso/launch/{sysId}', [SsoLaunchController::class, 'launch'])->name('sso.launch');
});

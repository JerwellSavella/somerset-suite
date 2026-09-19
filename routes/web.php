<?php

use App\Http\Controllers\SsoLaunchController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');

    Route::get('sso/launch/{sysId}', [SsoLaunchController::class, 'launch'])->name('sso.launch');
});

require __DIR__.'/settings.php';

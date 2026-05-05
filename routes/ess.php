<?php

use Illuminate\Support\Facades\Route;

Route::prefix('ess')
    ->name('ess.')
    ->middleware(['auth', 'permission:access ess portal'])
    ->group(function () {
        Route::get('/', function () {
            return view('ess.dashboard');
        })->name('dashboard');
    });

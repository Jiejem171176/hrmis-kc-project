<?php

use Illuminate\Support\Facades\Route;

Route::prefix('ess')
    ->name('ess.')
    ->group(function () {
        Route::get('/', function () {
            return view('ess.dashboard');
        })->name('dashboard');
    });

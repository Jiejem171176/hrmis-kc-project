<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return 'HRMIS KC Admin Area';
})->name('admin.dashboard');

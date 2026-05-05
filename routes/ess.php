<?php

use Illuminate\Support\Facades\Route;

Route::get('/ess', function () {
    return 'HRMIS KC ESS Area';
})->name('ess.dashboard');

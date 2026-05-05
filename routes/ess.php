<?php

use App\Http\Controllers\Ess\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/ess', [DashboardController::class, 'index'])
    ->name('ess.dashboard');

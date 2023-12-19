<?php

use \Illuminate\Support\Facades\Route;

/**
 * Routes for the Laravel Dashboard
 */
Route::get('/link1',
            [\AchyutN\Dashboard\Controllers\DashboardController::class, 'link1'])
     ->name('link1');
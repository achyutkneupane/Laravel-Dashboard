<?php

use \Illuminate\Support\Facades\Route;

/**
 * Routes for the Laravel Dashboard
 */
Route::get('/link1', function () {
    return app('view')->make('dashboard::link1');
})->name('link1');
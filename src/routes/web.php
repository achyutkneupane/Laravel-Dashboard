<?php

use \Illuminate\Support\Facades\Route;

/**
 * Routes for the Laravel Dashboard
 */
if(config('dashboard.enableTestRoutes')) {
    Route::get('/link1', function () {
        return app('view')->make('dashboard::link1');
    })->name('link1');

    Route::get('/sub1', function () {
        return app('view')->make('dashboard::link1');
    })->name('parent.sub1');
    Route::get('/sub2', function () {
        return app('view')->make('dashboard::link1');
    })->name('parent.sub2');
}

if(config('dashboard.enableLogout')) {
    Route::get('/logout', function () {
        auth()->logout();
        return redirect()->route('login');
    })->name('logout');
}
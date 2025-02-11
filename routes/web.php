<?php

use App\Http\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/refresh', [LoginController::class, 'refresh'])->name('refresh_jwt_token');
});

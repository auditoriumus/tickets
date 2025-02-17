<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'v1',
    'namespace' => 'App\Http\Controllers\api\v1'
], function () {
    Route::apiResource('users', 'UserController');
    Route::apiResource('regions', 'RegionController');
});

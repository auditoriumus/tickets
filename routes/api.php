<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'App\Http\Controllers\Api\v1',
    'prefix' => 'v1'
], function () {
    Route::group([
        'namespace' => 'CatalogControllers'
    ], function () {
        Route::apiResource('employees', 'EmployeeController');
    });
});

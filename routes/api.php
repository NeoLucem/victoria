<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//api/v1
Route::group(['prefix'=>'v1', 'namespace'=>'App\Http\Controllers\Api\V1'], function () {
    Route::apiResource('restaurants', 'RestaurantController');
    Route::apiResource('employees', 'EmployeeController');
    Route::apiResource('tables', 'TabletteController');
});
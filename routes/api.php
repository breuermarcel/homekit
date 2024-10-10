<?php

use Illuminate\Support\Facades\Route;

// TODO: add auth sanctum
Route::group(['prefix' => 'v1'], function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::apiSingleton('user', App\Http\Resources\UserResource::class);
        Route::apiResource('electricities', App\Http\Controllers\Api\ElectricityController::class);
        Route::apiResource('gases', App\Http\Controllers\Api\GasController::class);
        Route::apiResource('oils', App\Http\Controllers\Api\OilController::class);
        Route::apiResource('waters', App\Http\Controllers\Api\WaterController::class);
    });
});

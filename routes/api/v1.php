<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiSingleton('user', App\Http\Resources\UserResource::class);
    Route::apiResource('electricities', App\Http\Controllers\Api\V1\ElectricityController::class);
    Route::apiResource('gases', App\Http\Controllers\Api\V1\GasController::class);
    Route::apiResource('oils', App\Http\Controllers\Api\V1\OilController::class);
    Route::apiResource('waters', App\Http\Controllers\Api\V1\WaterController::class);
});

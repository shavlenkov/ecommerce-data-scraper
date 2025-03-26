<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RetailerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MetricController;

Route::middleware('guest:sanctum')->group(function () {
    Route::post('/auth/sign-in', [AuthController::class, 'postSignIn']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/sign-out', [AuthController::class, 'postSignOut']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/products/metrics', MetricController::class)->name('products.metrics');
    Route::post('/retailers/metrics', MetricController::class)->name('retailers.metrics');

    Route::apiResource('users', UserController::class);
    Route::apiResource('retailers', RetailerController::class);
    Route::apiResource('products', ProductController::class);

    Route::post('/users/{user}/set-retailers', [UserController::class, 'setRetailers']);
});

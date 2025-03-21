<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

Route::middleware('guest:sanctum')->group(function () {
    Route::post('/auth/sign-in', [AuthController::class, 'postSignIn']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/sign-out', [AuthController::class, 'postSignOut']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

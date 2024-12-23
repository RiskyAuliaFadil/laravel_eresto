<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\TransactionController;


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');

Route::get('user-profile', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::apiResource('products', ProductController::class);
Route::apiResource('checkouts', CheckoutController::class);
Route::apiResource('payments', PaymentController::class);
Route::apiResource('transactions', TransactionController::class);
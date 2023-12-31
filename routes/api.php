<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [\App\Http\Controllers\API\AuthController::class, 'register']);
Route::post('login', [\App\Http\Controllers\API\AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::apiResource('wallets', \App\Http\Controllers\API\WalletController::class)->except(['update', 'destroy']);

    Route::post('transfer', [\App\Http\Controllers\API\TransactionController::class, 'transfer']);
    Route::get('transactions', [\App\Http\Controllers\API\TransactionController::class, 'transactions']);
});
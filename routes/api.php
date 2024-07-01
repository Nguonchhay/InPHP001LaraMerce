<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/categories', [App\Http\Controllers\Api\CategoryAPIController::class, 'index']);

Route::group([
    'prefix' => 'products'
], function() {
    Route::get('/', [App\Http\Controllers\Api\ProductAPIController::class, 'index']);
    Route::get('/{product}/show', [App\Http\Controllers\Api\ProductAPIController::class, 'show']);

});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

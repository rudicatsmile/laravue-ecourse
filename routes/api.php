<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthApiController;
use App\Http\Controllers\API\CategoryApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function(){

    Route::apiResource('category',CategoryApiController::class);

});

// Route::get('category',CategoryApiController::class);

Route::post('register',[AuthApiController::class,'register']);
Route::post('login',[AuthApiController::class,'login']);

<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/category',[CategoryController::class,'index']);
Route::post('/category',[CategoryController::class,'store']);
Route::get('/category/{category}',[CategoryController::class,'show']);
Route::put('/category/{category}',[CategoryController::class,'update']);
Route::delete('/category/{category}',[CategoryController::class,'destroy']);

Route::get('/product',[ProductController::class,'index']);
Route::post('/product',[ProductController::class,'store']);
Route::get('/product/{product}',[ProductController::class,'show']);
Route::put('/product/{product}',[ProductController::class,'update']);
Route::delete('/product/{product}',[ProductController::class,'destroy']);
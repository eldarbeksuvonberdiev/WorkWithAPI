<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('customAuth:admin,user')->group(function () {
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/product', [ProductController::class, 'index']);
});

Route::middleware('customAuth:admin,moderator')->group(function () {
    Route::post('/category', [CategoryController::class, 'store']);
    Route::get('/category/{category}', [CategoryController::class, 'show']);
    Route::put('/category/{category}', [CategoryController::class, 'update']);
    Route::delete('/category/{category}', [CategoryController::class, 'destroy']);

    Route::post('/product', [ProductController::class, 'store']);
    Route::get('/product/{product}', [ProductController::class, 'show']);
    Route::put('/product/{product}', [ProductController::class, 'update']);
    Route::delete('/product/{product}', [ProductController::class, 'destroy']);
});


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/check', [AuthController::class, 'check']);

    Route::post('/task', [TaskController::class, 'store'])->middleware('role');

    Route::middleware('check')->group(function () {
        Route::post('/comment', [CommentController::class, 'store']);
    });
});

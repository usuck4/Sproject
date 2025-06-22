<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\PhoneVerificationController;
use App\Http\Controllers\CategoryController;

Route::post('/register', [AuthController::class,'register']);
Route::post('/login',    [AuthController::class, 'login']);
Route::post('/logout',    [AuthController::class, 'logout']);

//auth api's



Route::post('/phone/send-code', [PhoneVerificationController::class, 'sendCode']);
Route::post('/phone/verify-code', [PhoneVerificationController::class, 'verify']);

//profile api's
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class,'logout']);
    Route::get('/profile', [ProfileController::class, 'show']);
    Route::put('/profile', [ProfileController::class, 'update']);
    Route::put('/profile/password', [ProfileController::class, 'updatePassword']);
    Route::post('/profile/photo', [ProfileController::class, 'updateAvatar']);
    Route::delete('/profile', [ProfileController::class, 'destroy']);
 

    
});

//category api's
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::get('/categories/{category}', [CategoryController::class, 'show']);
    Route::put('/categories/{category}', [CategoryController::class, 'update']);
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);
});
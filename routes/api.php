<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController; 
//register api's
Route::post('/register', [AuthController::class,'register']);
Route::post('/login',    [AuthController::class, 'login']);
Route::post('/logout',    [AuthController::class, 'logout']);

//profile api's
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class,'logout']);
    Route::get('/profile', [ProfileController::class, 'show']);
    Route::put('/profile', [ProfileController::class, 'update']);
    Route::put('/profile/password', [ProfileController::class, 'updatePassword']);
    Route::post('/profile/photo', [ProfileController::class, 'updatephoto']);
    Route::delete('/profile', [ProfileController::class, 'destroy']);
});
// Route::apiResource('profile', ProfileController::class)->only(['show','update']);
    // Route::get('/pitches', [PitchController::class, 'index']);
    // Route::post('/reservations', [ReservationController::class, 'store']);
    // Route::post('/payments', [PaymentController::class, 'store']);

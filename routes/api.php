<?php


use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class,'register']);
Route::post('/login',    [AuthController::class, 'login']);
Route::post('/logout',    [AuthController::class, 'logout']);


Route::middleware('auth:sanctum')->group(function () {
    // Route::apiResource('profile', ProfileController::class)->only(['show','update']);
    // Route::get('/pitches', [PitchController::class, 'index']);
    // Route::post('/reservations', [ReservationController::class, 'store']);
    // Route::post('/payments', [PaymentController::class, 'store']);
    Route::post('/logout', [AuthController::class,'logout']);
});

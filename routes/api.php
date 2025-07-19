<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HashtagController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TimelineController;
use Illuminate\Support\Facades\Route;

// Register
Route::post('/register', [AuthController::class, 'register']);
//Login
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // Timelines
    Route::apiResource('timelines', TimelineController::class)->only(['index', 'store', 'show']);
    // Hashtags
    Route::apiResource('hashtags', HashtagController::class)->only(['index', 'store']);
    // Notes
    Route::apiResource('notes', NoteController::class)->only(['index', 'store']);
    // Images
    Route::apiResource('images', ImageController::class)->only(['index', 'store']);
});

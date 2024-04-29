<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::prefix('/dashboard')->name('dashboard.')
    ->middleware(['auth:sanctum', 'role:admin'])
    ->group(function () {

    Route::apiResource('users', UserController::class);
    Route::apiResource('courses', \App\Http\Controllers\API\CourseAPIControlller::class);
    Route::apiResource('students', \App\Http\Controllers\API\StudentAPIControlller::class);
});

Route::middleware('auth:sanctum')->get('/user/profile', [UserProfileController::class, 'getProfile']);

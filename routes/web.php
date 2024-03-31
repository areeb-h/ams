<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {

        Route::resource('students', App\Http\Controllers\StudentController::class)->names('students');
        Route::resource('courses', App\Http\Controllers\CourseController::class)->names('courses');
        Route::resource('teachers', App\Http\Controllers\TeacherController::class)->names('teachers');
        Route::resource('sessions', App\Http\Controllers\StudySessionController::class)->names('sessions');
        Route::resource('attendances', App\Http\Controllers\AttendanceController::class)->names('attendances');
        Route::resource('users', App\Http\Controllers\UserController::class)->names('users');

    });
});


//Route::resource('students', App\Http\Controllers\StudentController::class);
//
//Route::resource('courses', App\Http\Controllers\CourseController::class);
//
//Route::resource('teachers', App\Http\Controllers\TeacherController::class);
//
//Route::resource('sessions', App\Http\Controllers\SessionController::class);
//
//Route::resource('attendances', App\Http\Controllers\AttendanceController::class);
//
//Route::resource('users', App\Http\Controllers\UserController::class);


//Route::resource('students', App\Http\Controllers\StudentController::class);
//
//Route::resource('courses', App\Http\Controllers\CourseController::class);
//
//Route::resource('teachers', App\Http\Controllers\TeacherController::class);
//
//Route::resource('study-sessions', App\Http\Controllers\StudySessionController::class);
//
//Route::resource('study-groups', App\Http\Controllers\StudyGroupController::class);
//
//Route::resource('attendances', App\Http\Controllers\AttendanceController::class);
//
//Route::resource('users', App\Http\Controllers\UserController::class);

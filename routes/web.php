<?php

use App\Filament\Resources\AttendanceResource\Pages\CreateAttendance;
use App\Filament\Resources\AttendanceResource\Pages\MarkAttendance;
use App\Http\Controllers\StudySessionController;
use App\Http\Controllers\Website\WebsiteController;
use Illuminate\Support\Facades\Route;

//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified',
//])->group(function () {
//
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//
//    Route::prefix('dashboard')->name('dashboard.')->group(function () {
//
//        Route::resource('students', StudentController::class)->names('students');
//        Route::resource('courses', CourseController::class)->names('courses');
//        Route::resource('teachers', TeacherController::class)->names('teachers');
//        Route::resource('sessions', StudySessionController::class)->names('sessions');
//        Route::resource('attendances', AttendanceController::class)->names('attendances');
//        Route::resource('users', UserController::class)->names('users');
//
//        Route::patch('students', [App\Http\Controllers\StudentController::class, 'toggleStatus'])->name('students.toggleStatus');
//    });
//});

Route::prefix('/')->name('website.')->group(function () {
    Route::get('', [WebsiteController::class, 'index'])->name('index');
    Route::get('about', [WebsiteController::class, 'about'])->name('about');
});

Route::post('/dashboard/attendances/{record}/mark-attendance', [StudySessionController::class, 'saveAttendance'])
    ->name('filament.admin.resources.attendances.mark-attendance.save');

Route::post('/dashboard/attendances/{session}/save-new-attendance', [StudySessionController::class, 'saveNewAttendance'])
    ->name('filament.admin.resources.attendances.save-new-attendance');




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

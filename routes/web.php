<?php

use App\Http\Controllers\StudySessionController;
use App\Http\Controllers\Website\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

//Route::prefix('/')->name('website.')->group(function () {
//    Route::get('', [WebsiteController::class, 'index'])->name('index');
//    Route::get('about', [WebsiteController::class, 'about'])->name('about');
//});

Route::prefix('/dashboard/attendances/{record}/')->name('filament.admin.resources.attendances.')->group(function () {
    Route::post('mark-attendance', [StudySessionController::class, 'saveAttendance'])->name('mark-attendance.save');
    Route::post('create-attendance', [StudySessionController::class, 'saveNewAttendance'])->name('create-attendance.save');
});

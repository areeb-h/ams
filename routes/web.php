<?php

use App\Http\Controllers\StudySessionController;
use App\Http\Controllers\Website\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

//Route::prefix('/')->name('website.')->group(function () {
//    Route::get('', [WebsiteController::class, 'index'])->name('index');
//    Route::get('about', [WebsiteController::class, 'about'])->name('about');
//});

Route::prefix('/dashboard/attendances/')->name('filament.admin.resources.attendances.')->group(function () {
    Route::post('{record}/mark-attendance', [StudySessionController::class, 'saveAttendance'])->name('mark-attendance.save');
    Route::post('create-attendance', [StudySessionController::class, 'saveNewAttendance'])->name('create-attendance.save');
});


Route::get('/pdf', function () {
    $studySession = \App\Models\StudySession::findOrFail(33);

    $className = $studySession['studyGroup']['name'];
    $sessionDate = $studySession['date'];
    $sessionFromTime = $studySession['from_time'];
    $sessionToTime = $studySession['to_time'];
    $students = $studySession->students()->get();

    return view('test', compact(
        'studySession', 'students', 'sessionDate', 'sessionFromTime', 'sessionToTime'
    ));
})->name('custom.route');

//Route::get('/dashboard/study-groups/fetch-students', [StudySessionController::class, 'fetchStudents'])->name('fetch.students');


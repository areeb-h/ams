<?php

namespace App\Filament\Resources\StudySessionResource\Pages;

use App\Filament\Resources\StudySessionResource;
use Filament\Resources\Pages\Page;
use App\Models\StudySession;

class MarkAttendance extends Page
{
    protected static string $resource = StudySessionResource::class;
    protected static string $view = 'filament.resources.study-sessions-resource.pages.mark-attendance';

    public $sessionId;
    public $studySession;
    public $attendances;

    public function mount($session): void
    {
        $this->sessionId = $session;
        $this->studySession = StudySession::with('students')->findOrFail($session);
        $this->attendances = $this->studySession->attendances;
    }
//    public function saveAttendance(): void
//    {
//        $attendanceData = request('attendance', []);
//
//        DB::transaction(function () use ($attendanceData) {
//            foreach ($attendanceData as $studentId => $attended) {
//                $this->studySession->attendances()->updateOrCreate(
//                    [
//                        'study_session_id' => $this->sessionId,
//                        'student_id' => $studentId,
//                    ],
//                    ['attended' => $attended === '1']
//                );
//            }
//        });
//    }
}

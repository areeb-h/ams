<?php

namespace App\Filament\Resources\AttendanceResource\Pages;

use App\Filament\Resources\StudySessionResource;
use App\Models\StudySession;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\Page;

class MarkAttendance extends EditRecord
{
    protected static string $resource = StudySessionResource::class;
    protected static string $view = 'filament.resources.attendance-resource.pages.mark-attendance';

    public $sessionId;
    public $studySession;
    public $attendances;

    public function mount($record): void
    {
        parent::mount($record);

        $this->studySession = $this->record; // Since parent::mount() already sets $this->record
        $this->sessionId = $this->record->id;
        $this->attendances = $this->studySession->attendances;
    }

    public function setAttendance($studentId, $status)
    {
        $this->attendances[$studentId] = $status;
    }

    public function getTitle(): string
    {
        return 'Attendance Sheet';
    }

    public function getBreadcrumbs(): array
    {
        return [
            url()->route('filament.admin.pages.dashboard') => 'Dashboard',
            url()->route('filament.admin.resources.attendances.index') => 'Attendances',
            '' => $this->getTitle(),
        ];
    }
}

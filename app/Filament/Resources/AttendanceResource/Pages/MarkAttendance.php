<?php

namespace App\Filament\Resources\AttendanceResource\Pages;

use App\Filament\Resources\StudySessionResource;
use App\Models\StudySession;
use App\Traits\AdminAuthorization;
use Dompdf\Dompdf;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\Page;
use Filament\Tables\Actions\EditAction;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Component\HttpFoundation\StreamedResponse;

class MarkAttendance extends EditRecord
{
    // use AdminAuthorization;

    protected static string $resource = StudySessionResource::class;
    protected static string $view = 'filament.resources.attendance-resource.pages.mark-attendance';

    public $sessionId;
    public $studySession;
    public $attendances;

    public function mount($record): void
    {
        parent::mount($record);

        $this->studySession = $this->record;
        $this->sessionId = $this->record->id;
        $this->attendances = $this->studySession->attendances;
    }

    public function setAttendance($studentId, $status)
    {
        $this->attendances[$studentId] = $status;
    }

    public function generateSheet(StudySession $studySession): StreamedResponse
    {
        $dompdf = new Dompdf();

        $className = $studySession['studyGroup']['name'];
        $sessionDate = $studySession['date'];
        $sessionFromTime = $studySession['from_time'];
        $sessionToTime = $studySession['to_time'];
        $students = $studySession->students()->get();

        $html = View::make('pdf', compact(
            'studySession', 'students', 'sessionDate', 'sessionFromTime', 'sessionToTime'
        ))->render();

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4');

        $dompdf->render();

        $pdfContent = $dompdf->output();

        return response()->streamDownload(
            fn() => print($pdfContent), "$className _$sessionDate _.pdf"
        );
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

<?php

namespace App\Filament\Resources\AttendanceResource\Pages;

use App\Filament\Resources\AttendanceResource;
use App\Filament\Resources\StudySessionResource;
use App\Models\StudyGroup;
use Filament\Actions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Http\Request;

class CreateAttendance extends CreateRecord
{
    protected static string $resource = AttendanceResource::class;
    protected static string $view = 'filament.resources.attendance-resource.pages.create-attendance';

    public object $classes;

    public ?string $studyGroupId;
    public ?object $students;

    public function mount(): void
    {
        parent::mount();

        $teacherId = auth()->user()->teacher->id ?? null;

        if ($teacherId) {
            $this->classes = StudyGroup::whereHas('teachers', function ($query) use ($teacherId) {
                $query->where('teachers.id', $teacherId);
            })->get();
        } else {
            $this->classes = collect(StudyGroup::all());
        }

        $this->students = collect();

//        $this->students = collect();
//        $this->studyGroupId = '1';

    }

    public function fetchStudents($studyGroupId): void
    {
        //return $studyGroupId === 'nothing'?  true: false;

//        $studyGroup = StudyGroup::findOrFail($studyGroupId)?? '';
//
//        $this->students = $studyGroup->students;

        if (!empty($studyGroupId)) {
            try {
                $studyGroup = StudyGroup::findOrFail($studyGroupId);
                $this->students = $studyGroup->students;
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                $this->students = null;
            }
        }
        $this->studyGroupId = $studyGroupId;
    }

    public function getTitle(): string
    {
        return 'New Attendance Sheet';
    }

    public function getBuss(): string
    {
        return 'New Attendance ';
    }

    public static function createButtonLabel(): string
    {
        return 'YourButtonTextHere';
    }

    public function getBreadcrumbs(): array
    {
        return [
            url()->route('filament.admin.pages.dashboard') => 'Dashboard',
            url()->route('filament.admin.resources.attendances.index') => 'Attendance',
            '' => $this->getTitle(),
        ];
    }
}

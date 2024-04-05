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

    //public ?string $selectedClassId = null;
    public $students = [];

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

        $this->students = collect(); // Ensure this is a collection

    }

//    public function setStudents(StudyGroup $value): void
//    {
//        $this->students = $value?->students()->get() ?? collect();
//    }

    public function updatedSelectedClassId($value)
    {
        // Fetch the students associated with the selected class
        $selectedClass = StudyGroup::find($value);
        if ($selectedClass) {
            $this->students = $selectedClass->students ?? collect();
        } else {
            $this->students = collect(); // Reset students if no class is selected
        }
    }

    public function getTitle(): string
    {
        return 'New Attendance Sheet';
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

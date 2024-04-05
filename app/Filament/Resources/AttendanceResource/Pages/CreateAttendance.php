<?php

namespace App\Filament\Resources\AttendanceResource\Pages;

use App\Filament\Resources\AttendanceResource;
use App\Filament\Resources\StudySessionResource;
use App\Models\StudyGroup;
use Filament\Actions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Resources\Pages\CreateRecord;

class CreateAttendance extends CreateRecord
{
    protected static string $resource = AttendanceResource::class;
    protected static string $view = 'filament.resources.attendance-resource.pages.create-attendance';

    protected function getFormSchema(): array
    {
        return [
            Select::make('study_group_id')
                ->label('Study Group')
                ->options(StudyGroup::all()->pluck('name', 'id'))
                ->required(),
            DatePicker::make('date')
                ->label('Date')
                ->required(),
            // Define your action button here to populate attendances
        ];
    }

    public function getTitle(): string
    {
        return 'Attendance Sheet';
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

<?php

namespace App\Filament\Resources\StudentResource\Widgets;

use App\Models\Student;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StudentOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $totalStudents = Student::count();

        return [
            BaseWidget\Card::make('Total Students', $totalStudents),
        ];
    }
}

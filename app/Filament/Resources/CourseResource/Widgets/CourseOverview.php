<?php

namespace App\Filament\Resources\CourseResource\Widgets;

use App\Models\Course;
use App\Models\CourseType;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CourseOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $totalCourses = Course::count();

        // Calculate the average number of sessions per course
        $avgSessionsPerCourse = Course::has('studySessions') // Ensure the course has study sessions
        ->withCount('studySessions') // Count the sessions for each course
        ->get() // Get the collection of courses with their sessions count
        ->avg('study_sessions_count'); // Calculate the average


        return [
            BaseWidget\Card::make('Total Courses', $totalCourses),
            BaseWidget\Card::make('Avg Sessions/Course', $avgSessionsPerCourse),
        ];
    }
}

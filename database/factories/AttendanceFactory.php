<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\StudySession;

class AttendanceFactory extends Factory
{
    protected $model = Attendance::class;

    public function definition(): array
    {
        return [
            'attended' => $this->faker->boolean(),
            'student_id' => Student::factory(),
            'study_session_id' => StudySession::factory(),
        ];
    }
}

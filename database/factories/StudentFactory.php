<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Student;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'admission_date' => $this->faker->dateTime(),
            'dob' => $this->faker->dateTime(),
            'status' => $this->faker->word(),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Course;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'age_range' => $this->faker->word(),
            'description' => $this->faker->text(),
        ];
    }
}

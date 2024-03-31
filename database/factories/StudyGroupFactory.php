<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\StudyGroup;

class StudyGroupFactory extends Factory
{
    protected $model = StudyGroup::class;

    public function definition(): array
    {
        return [
            'from_time' => $this->faker->dateTime(),
            'to_time' => $this->faker->dateTime(),
            'duration' => $this->faker->numberBetween(-10000, 10000),
            'description' => $this->faker->text(),
        ];
    }
}

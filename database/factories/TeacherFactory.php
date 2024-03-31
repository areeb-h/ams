<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Teacher;
use App\Models\User;

class TeacherFactory extends Factory
{
    protected $model = Teacher::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'city' => $this->faker->city(),
            'country' => $this->faker->country(),
            'postal_code' => $this->faker->postcode(),
            'user_id' => User::factory(),
        ];
    }
}

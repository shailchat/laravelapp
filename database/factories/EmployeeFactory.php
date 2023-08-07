<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "empId" => fake()->numberBetween(1002, 9999),
            "name" => fake()->name(),
            "joiningDate" => fake()->date(),
            "designation" => "Developer",
            "role" => "contract",
            "email" => fake()->unique()->safeEmail()
        ];
    }
}

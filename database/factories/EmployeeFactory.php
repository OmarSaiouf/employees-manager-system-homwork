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
            "first_name" => $this->faker->firstName,
            "last_name" => $this->faker->lastName,
            "email" => $this->faker->email,
            "rank" => $this->faker->randomElement(['Lead', 'Senior', 'Junior', 'Intern']),
            "phone" => $this->faker->phoneNumber,
            "city" => $this->faker->city,
            "salary" => $this->faker->randomFloat(2, 30000, 100000),
            "department" => $this->faker->word,
            "description" => $this->faker->text,

        ];
    }
}

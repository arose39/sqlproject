<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $firstNames = [];
        $lastNames = [];
        for ($i = 0; $i < 20; $i++) {
            $firstNames[] = $this->faker->firstName;
            $lastNames[] = $this->faker->firstName;
        }

        return [
            'first_name' => $this->faker->randomElement($firstNames),
            'last_name' => $this->faker->randomElement($lastNames),
            'group_id' => $this->faker->optional($weight = 0.9)->numberBetween(1, 10)
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    public $courseNames = [
        'math', 'Biology', 'programming', 'Economy', 'Macroeconomy',
        'Microeconomy', 'Painting', 'Physical trainings', 'Design ', 'Art & Design',
        'Design & Creativity', 'Business', 'Negotiation', 'Business Intelligence',
        'Computer Science', 'General', 'Computer', 'Networking', 'Data Science',
        'Data Science', 'Education & Teaching', 'Education', 'Health & Medicine',
        'Humanities', 'Culture', 'Mathematics', 'Geometry'
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement($this->courseNames),
            'description' => $this->faker->sentence('12', true)
        ];
    }
}

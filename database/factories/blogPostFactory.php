<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class blogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'content'=> $this->faker->paragraph(2),
            'created_at' => $this->faker->dateTimeBetween('-4 months'),
            // 'user_id'=> $this->faker->randomElement([1,2,3]),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'tags' => implode(', ', fake()->words(3)), // joining an array into a string using implode
            'company' => fake()->company(),
            'location' => fake()->city(),
            'email' => fake()->unique()->companyEmail(),
            'website' => fake()->url(),
            'description' => fake()->paragraph(7),
        ];
    }
}

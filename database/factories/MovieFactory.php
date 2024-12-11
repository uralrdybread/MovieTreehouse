<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rating' => $this->faker->randomElement(['G', 'PG', 'PG-13', 'R', 'NC-17']), // Random rating
            'title' => $this->faker->sentence(3), // Random 3-word title
            'director' => $this->faker->name(), // Random director's name
            'release_year' => $this->faker->year(), // Random year
            'genre' => $this->faker->randomElement(['Drama', 'Comedy', 'Action', 'Horror', 'Sci-Fi']), // Random genre
            'description' => $this->faker->paragraph(), // Random description
            'status' => $this->faker->randomElement(['available', 'checked out']), // Random status
            'stars' => $this->faker->numberBetween(1, 5), // Random star rating (1-5)
        ];
    }
}

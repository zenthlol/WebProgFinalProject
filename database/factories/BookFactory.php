<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'publisher_id' => $this->faker->numberBetween(1,7),
            'title' => ucfirst($this->faker->words(rand(3, 4), true)),
            'author' => $this->faker->name(),
            'year' => $this->faker->year(),
            'synopsis' => $this->faker->text(50),
            // 'image' => $this->faker->text(10)
            'image' => 'images/cover-images/harry-potter.jpeg'
        ];
    }
}

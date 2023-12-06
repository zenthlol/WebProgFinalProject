<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Publisher>
 */
class PublisherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->text(7),
            'address'=> $this->faker->text(10),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'image' => 'images/publisher-images/naruto.jpg'
        ];
        // return [
        //     'name'=> $this->faker->name(),
        //     'address'=> $this->faker->text(10),
        //     'phone' => $this->faker->phoneNumber(),
        //     'email' => $this->faker->email(),
        //     'image' => 'assets/naruto.jpg'
        // ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Broker>
 */
class BrokerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'address' => fake()->unique()->address(),
            'city' => fake()->city(),
            'zip_code' => fake()->unique()->postcode(),
            'phone_number' => fake()->unique()->phoneNumber(),
            'logo_path' => fake()->image,
        ];
    }
}

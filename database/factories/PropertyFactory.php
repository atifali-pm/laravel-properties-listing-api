<?php

namespace Database\Factories;

use App\Enums\ListingTypeEnum;
use App\Models\Broker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'broker_id' => Broker::factory(),
            'address' => fake()->unique()->address(),
            'city' => fake()->city(),
            'zip_code' => fake()->unique()->postcode(),
            'description' => fake()->sentence,
            'listing_type' => ListingTypeEnum::OPEN->value,
            'build_year' => fake()->year,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Enums\PropertyStatusEnum;
use App\Enums\PropertyTypeEnum;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PropertyCharacteristic>
 */
class PropertyCharacteristicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'property_id' => Property::factory(),
            'price' => fake()->randomFloat('0',10000,300000),
            'bedrooms' => fake()->unique()->numberBetween(1, 8),
            'bathrooms' => fake()->unique()->numberBetween(1, 5),
            'sqft' => fake()->randomFloat('0',100,300),
            'price_sqft' => fake()->randomFloat('0',400,500),
            'property_type' => PropertyTypeEnum::SINGLE->value,
            'status' => PropertyStatusEnum::SALE->value,
        ];
    }
}

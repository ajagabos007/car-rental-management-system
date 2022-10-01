<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CarType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=> fake()->unique()->word(),
            'rental_company' => 'Auto Rental',
            'rental_information' => fake()->unique()->paragraph(),
            'no_of_passenger' => fake()->numberBetween(1,5),
            // 'car_type_id' => CarType::factory()->create()->id,
            'no_of_baggage' => fake()->numberBetween(1,5),
            'price'  => fake()->numberBetween(100, 20000),
         ];
    }
}

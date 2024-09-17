<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Officar>
 */
class OfficarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Office_Name'=>fake()->sentence(3),
            'address'=>fake()->text(10),
            'Country'=>fake()->text(10),
            'current_balance'=>fake()->numberBetween(1,10000),
        ];
    }
}

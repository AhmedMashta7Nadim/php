<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Remittances>
 */
class RemittancesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'num_Remitten'=>fake()->numberBetween(1,100),
            'sending_Office'=>fake()->sentence(3),
            'Future_Office'=>fake()->sentence(3),
            'Amount_Trens'=>fake()->numberBetween(1,1000),
            'date'=>fake()->dateTime('now'),
        ];
    }
}

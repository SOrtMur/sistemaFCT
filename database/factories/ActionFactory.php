<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Action>
 */
class ActionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => fake()->name(),
            'date' => fake()->date(),
            'interval' => fake()->numberBetween(0.0,10.0),
            'user_id' => fake()->numberBetween(1, User::count())
        ];
    }
}

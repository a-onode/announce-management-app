<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announce>
 */
class AnnounceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'name' => $this->faker->company(),
            'text' => $this->faker->realText(),
            'authority' => $this->faker->numberBetween(1, 5),
            'type' => $this->faker->numberBetween(1, 4),
            'is_visible' => $this->faker->boolean(),
            'created_at' => $this->faker->dateTimeBetween('-2 years', 'now'),
        ];
    }
}

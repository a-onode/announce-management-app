<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Follower>
 */
class FollowerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $followingIds = User::all()->pluck('id');
        $followedIds = User::all()->pluck('id');
        $matrix = $followedIds->crossJoin($followingIds);
        $keypair = $this->faker->unique()->randomElement($matrix);

        while ($keypair[0] === $keypair[1]) {
            $keypair = $this->faker->unique()->randomElement($matrix);
        }

        return [
            'following_id' => $keypair[0],
            'followed_id' => $keypair[1],
        ];
    }
}

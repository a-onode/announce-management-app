<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Announce;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Favorite>
 */
class FavoriteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userIds = User::pluck('id');
        $announceIds = Announce::pluck('id');
        $matrix = $userIds->crossJoin($announceIds);
        $keypair = $this->faker->unique()->randomElement($matrix);
        // dd($keypair);

        return [
            'user_id' => $keypair[0],
            'announce_id' => $keypair[1],
        ];
    }
}

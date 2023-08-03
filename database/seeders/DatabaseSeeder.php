<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            AnnounceSeeder::class,
            CommentSeeder::class,
            FavoriteSeeder::class,
            FollowerSeeder::class,
        ]);

        \App\Models\User::factory(30)->create();
        \App\Models\Announce::factory(100)->create();
        \App\Models\Comment::factory(200)->create();
        \App\Models\Favorite::factory(200)->create();
        \App\Models\Follower::factory(600)->create();
    }
}

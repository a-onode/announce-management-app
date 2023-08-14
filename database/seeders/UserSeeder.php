<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'テストユーザ',
            'email' => 'test@test.com',
            'tel' => '08011112222',
            'password' => Hash::make('password123'),
            'role' => 5,
            'profile_image' => 'defaults/image (' . rand(1, 13) . ').png',
            'background_image' => 'defaults/colorful.jpg',
            'joined_date' => '2020-01-10',
        ]);
    }
}

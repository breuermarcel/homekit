<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => env("SEEDER_USER_NAME"),
            'email' => env("SEEDER_USER_EMAIL"),
            'password' => bcrypt(env("SEEDER_USER_PASSWORD")),
        ]);
    }
}

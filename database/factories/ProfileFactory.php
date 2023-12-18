<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "username"=> fake()->userName(),
            "email"=> fake()->safeEmail(),
            "password"=> fake()->password(8,16),
            "age"=> fake()->numberBetween(13,78),
            "bio"=> fake()->text(),
            "image"=> "profiles-pics/".fake()->image("public/storage/profiles-pics",fullPath:false),
        ];
    }
}

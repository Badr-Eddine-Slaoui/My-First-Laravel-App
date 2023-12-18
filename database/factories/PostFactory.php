<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title"=> fake()->title(),
            "description"=> null,
            "image"=> "posts-pics/".fake()->image("public/storage/posts-pics",fullPath:false),
            "profile_id" => fake()->numberBetween(1,Profile::count()),
        ];
    }
}

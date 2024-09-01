<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $title = fake()->title();
        $title = fake()->sentence(5);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => fake()->paragraph(3),
            'type' => fake()->randomElement(['free', 'paid']),
            'level' => fake()->randomElement(['Beginner', 'Medium', 'Expert']),
            'total_section' => fake()->numberBetween(5,15),
            'duration' => fake()->numberBetween(1,25),
            'cover_image' => fake()->imageUrl(640, 480, 'education', true),
            'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}

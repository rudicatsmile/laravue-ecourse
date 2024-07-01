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
        $title = fake()->title();
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->firts()->id
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Story>
 */
class StoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id'=>Category::factory(),
            'title'=>fake()->sentence(),
            'slug'=>fake()->slug(),
            'intro'=>fake()->sentence(),
            'body'=>fake()->paragraph(),
            'user_id'=>User::factory()
        ];
    }
}

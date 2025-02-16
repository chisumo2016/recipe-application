<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'name' => $this->faker->sentence,
             'description' => $this->faker->paragraph,
             'ingredients' => $this->faker->paragraph,
             'instructions' => $this->faker->paragraph,
             'image' => $this->faker->imageUrl,
             'category_id' => Category::factory(),
             'created_at' => now(),
             'updated_at' => now(),
        ];
    }
}

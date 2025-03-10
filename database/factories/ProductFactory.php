<?php

namespace Database\Factories;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'category_id' => Category::factory(),
            'image' => fake()->image( asset('images/.'  )),
            'description' => fake()->text(),
            'in_stock' => fake()->numberBetween(5, 50),
            'price' => fake()->numberBetween(50, 5000),
        ];
    }
}

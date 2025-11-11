<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(3),             
            'description' => fake()->paragraph(),     
            'price' => fake()->randomFloat(2, 10, 2000), 
            'brand_id' => Brand::factory(),            
            'category_id' => Category::factory(),      
            'url_image' => fake()->imageUrl(),
        ];
    }
}

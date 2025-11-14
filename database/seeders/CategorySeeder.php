<?php

namespace Database\Seeders;

use App\Models\Category;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Limpiar duplicados existentes primero
        $categories = [
            'Phones',
            'Computers',
            'TVs',
            'Appliances',
            'Cameras',
            'Audio',
            'Wearables',
            'Gaming',
            'Networking',
            'Accessories'
        ];

        foreach ($categories as $categoryName) {
            Category::firstOrCreate(['name' => $categoryName]);
        }
    }


}

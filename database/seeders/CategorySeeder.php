<?php

namespace Database\Seeders;

use App\Models\Category;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Categorías fijas
        Category::create(['name' => 'Phones']);
        Category::create(['name' => 'Computers']);

        // Workaround: usar la clase del factory directamente
        CategoryFactory::new()->count(200)->create();
    }
}

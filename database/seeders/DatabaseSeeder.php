<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;
use App\Models\Product;


class DatabaseSeeder extends Seeder
{

    public function run()
    {

        $this->call([
                CategorySeeder::class
        ]);
        
        Product::factory(1000)->create();
    }
}

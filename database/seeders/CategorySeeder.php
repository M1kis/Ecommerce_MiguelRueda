<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run()
    {
        $categoryPhones = new Category();
        $categoryPhones->name ='Phones';
        $categoryPhones->save();

        $categoryComputers = new Category();
        $categoryComputers->name ='Computers';
        $categoryComputers->save();

        Category::factory(200)->create();

    }
}

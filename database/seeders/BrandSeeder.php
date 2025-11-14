<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Limpiar duplicados existentes primero
        $brands = [
            'Apple',
            'Samsung',
            'Sony',
            'LG',
            'Dell',
            'HP',
            'Lenovo',
            'Asus',
            'Acer',
            'Microsoft'
        ];

        foreach ($brands as $brandName) {
            Brand::firstOrCreate(['name' => $brandName]);
        }
    }
}

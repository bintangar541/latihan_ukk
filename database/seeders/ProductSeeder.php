<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Kopi Hitam',
            'stock' => 50,
            'price' => 5000,
            'image' => 'kopi.jpg'
        ]);

        Product::create([
            'name' => 'Teh Manis',
            'stock' => 40,
            'price' => 4000,
            'image' => 'teh.jpg'
        ]);
    }
}


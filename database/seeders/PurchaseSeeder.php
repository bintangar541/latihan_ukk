<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Purchase;

class PurchaseSeeder extends Seeder
{
    public function run()
    {
        Purchase::create([
            'products_id' => 1,
            'user_id' => 1,
            'member_id' => 1,
            'total_price' => 5000,
            'total_payment' => 10000,
            'change' => 5000
        ]);

        Purchase::create([
            'products_id' => 2,
            'user_id' => 2,
            'member_id' => 2,
            'total_price' => 4000,
            'total_payment' => 5000,
            'change' => 1000
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Purchase;
use App\Models\User;
use App\Models\Member;
use App\Models\Product;

class PurchaseSeeder extends Seeder
{
    public function run()
    {
        // Mendapatkan ID user yang valid (misalnya ID pertama)
        $userId = User::first()->id; // Misalnya kita ambil user pertama sebagai petugas
        $memberId = Member::first()->id; // Ambil member pertama, bisa disesuaikan
        $productId = Product::first()->id; // Ambil produk pertama yang ada, bisa disesuaikan

        // Menambahkan data pembelian
        Purchase::create([
            'products_id' => $productId,
            'user_id' => $userId,
            'member_id' => $memberId,
            'total_price' => 100000,
            'total_payment' => 100000,
            'change' => 0,
        ]);

        // Menambahkan pembelian lainnya
        Purchase::create([
            'products_id' => $productId,
            'user_id' => $userId,
            'member_id' => $memberId,
            'total_price' => 150000,
            'total_payment' => 150000,
            'change' => 0,
        ]);
    }
}

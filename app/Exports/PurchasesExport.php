<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use App\Models\Purchase;

class PurchasesExport implements FromArray
{
    public function array(): array
    {
        // Ambil data pembelian dari model Purchase
        $purchases = Purchase::with('product', 'user', 'member')->get();

        $data = [];

        // Menambahkan header untuk Excel
        $data[] = ['Nama Pelanggan', 'Tanggal Penjualan', 'Total Harga', 'Dibuat Oleh'];

        // Menambahkan data pembelian ke array
        foreach ($purchases as $purchase) {
            $data[] = [
                $purchase->member ? $purchase->member->name : 'N/A',  // Nama Pelanggan
                $purchase->created_at->format('Y-m-d H:i:s'),  // Tanggal Penjualan
                $purchase->total_price,  // Total Harga
                $purchase->user->name,  // Dibuat Oleh
            ];
        }

        return $data;
    }
}

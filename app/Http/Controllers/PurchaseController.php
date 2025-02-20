<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PurchasesExport;

class PurchaseController extends Controller
{
    // Menampilkan daftar pembelian
    public function index()
{
    // Ambil data pembelian beserta relasi user
    $purchases = Purchase::with('user', 'member')->get();

    return view('purchases.index', compact('purchases'));
}


    // Menampilkan detail pembelian
    public function show($id)
    {
        $purchase = Purchase::with('product', 'user', 'member')->findOrFail($id);
        return view('purchase.show', compact('purchase'));
    }

    // Mengekspor data penjualan ke Excel
    public function export()
    {
        return Excel::download(new PurchasesExport, 'purchases.xlsx');
    }

    // Mengunduh bukti transaksi
    public function downloadReceipt($id)
    {
        $purchase = Purchase::findOrFail($id);
        
        // Asumsikan Anda sudah memiliki file bukti transaksi di storage
        $path = storage_path('app/public/receipts/' . $purchase->id . '.pdf');
        
        // Cek apakah file ada
        if (file_exists($path)) {
            return response()->download($path);
        } else {
            // Jika file tidak ditemukan, tampilkan error
            return redirect()->route('purchases.index')->with('error', 'Bukti transaksi tidak ditemukan.');
        }
    }
}

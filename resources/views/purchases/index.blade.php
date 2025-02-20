@extends('layouts.app')

@section('title', 'Daftar Pembelian')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Pembelian</h2>

    <!-- Tombol Export -->
    <a href="{{ route('purchases.export') }}" class="btn btn-success mb-3">Export to Excel</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Penjualan</th>
                <th>Total Harga</th>
                <th>Dibuat Oleh</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($purchases as $key => $purchase)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $purchase->member->name ?? 'Tidak ada' }}</td> <!-- Menampilkan Nama Pelanggan -->
                    <td>{{ $purchase->created_at->format('d-m-Y H:i:s') }}</td> <!-- Tanggal Penjualan -->
                    <td>Rp. {{ number_format($purchase->total_price, 0, ',', '.') }}</td> <!-- Total Harga -->
                    <td>{{ $purchase->user->name ?? 'Tidak ada' }}</td> <!-- Nama Petugas -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

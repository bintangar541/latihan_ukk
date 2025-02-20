@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm p-4">
        <h2 class="fw-bold mb-4 text-center">Edit Produk</h2>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Produk</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Harga</label>
                <input type="text" name="price" id="price" class="form-control" value="{{ number_format($product->price, 0, ',', '.') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Stok</label>
                <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Gambar Produk</label>
                <input type="file" name="image" class="form-control">
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="mt-2 rounded shadow-sm" style="width: 100px; height: 100px; object-fit: cover;">
                @endif
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('products.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const priceInput = document.querySelector('input[name="price"]');
    
        // Fungsi untuk memformat angka dengan "Rp" saat halaman dimuat
        function formatPriceInput() {
            let value = priceInput.value.replace(/[^0-9]/g, ""); // Hanya angka
            if (value) {
                priceInput.value = "Rp " + parseInt(value).toLocaleString("id-ID");
            }
        }
    
        // Jalankan format harga saat halaman pertama kali dimuat
        formatPriceInput();
    
        // Event listener saat user mengetik di input harga
        priceInput.addEventListener("input", function () {
            let value = this.value.replace(/[^0-9]/g, ""); // Hanya angka
            if (value) {
                this.value = "Rp " + parseInt(value).toLocaleString("id-ID");
            } else {
                this.value = ""; // Jika kosong, Rp tidak muncul
            }
        });
    
        // Hapus format "Rp" sebelum form dikirim ke server
        document.querySelector("form").addEventListener("submit", function () {
            priceInput.value = priceInput.value.replace(/Rp\s?|[^0-9]/g, "");
        });
    });
    </script>
    
    
@endsection

@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Daftar Produk</h2>
        <a href="{{ route('products.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Produk</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover border shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $product)
                <tr class="align-middle">
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Produk" class="rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <span class="fw-bold">{{ $product->name }}</span>
                        </div>
                    </td>
                    <td class="text-success fw-semibold">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td id="stock-{{ $product->id }}">{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                        <button class="btn btn-sm btn-info upgrade-stock-btn" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-stock="{{ $product->stock }}"><i class="fas fa-plus"></i> Upgrade Stok</button>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus produk ini?')"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Upgrade Stok -->
<div class="modal fade" id="upgradeStockModal" tabindex="-1" aria-labelledby="upgradeStockModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="upgradeStockModalLabel">Upgrade Stok Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Produk:</strong> <span id="product-name"></span></p>
                <form id="upgradeStockForm">
                    @csrf
                    <input type="hidden" id="product-id">
                    <div class="mb-3">
                        <label for="additional-stock" class="form-label">Tambahkan Stok</label>
                        <input type="number" id="additional-stock" class="form-control" min="1" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Upgrade Stok</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script AJAX -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let modal = new bootstrap.Modal(document.getElementById('upgradeStockModal'));

        document.querySelectorAll(".upgrade-stock-btn").forEach(button => {
            button.addEventListener("click", function() {
                let productId = this.dataset.id;
                let productName = this.dataset.name;
                let currentStock = this.dataset.stock;

                document.getElementById("product-id").value = productId;
                document.getElementById("product-name").innerText = productName;
                
                let stockInput = document.getElementById("additional-stock");
                stockInput.value = currentStock;
                stockInput.min = 1;

                modal.show();
            });
        });

        document.getElementById("upgradeStockForm").addEventListener("submit", function(event) {
            event.preventDefault();
            let productId = document.getElementById("product-id").value;
            let additionalStock = document.getElementById("additional-stock").value;

            fetch(`/products/${productId}/upgrade-stock`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector("input[name=_token]").value
                },
                body: JSON.stringify({ additional_stock: additionalStock })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById(`stock-${productId}`).innerText = data.new_stock;
                    modal.hide();
                    alert("Stok berhasil diperbarui!");
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });
</script>
@endsection

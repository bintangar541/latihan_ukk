<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }
    
        Product::create([
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
            'image' => $imagePath,
        ]);
    
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }
    

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string', // Validasi sebagai string karena ada format "Rp"
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:2048', // Maksimal ukuran 2MB
        ]);
    
        // Hapus "Rp", spasi, dan titik pemisah ribuan pada harga
        $price = str_replace(['Rp', ' ', '.'], '', $request->price);
    
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $price;
        $product->stock = $request->stock;
    
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
    
            // Upload gambar baru
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }
    
        $product->save();
    
        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }
    
    

    public function upgradeStock(Request $request, $id)
{
    $request->validate([
        'additional_stock' => 'required|integer|min:1',
    ]);

    $product = Product::findOrFail($id);
    $product->stock += $request->additional_stock;
    $product->save();

    return response()->json([
        'success' => true,
        'new_stock' => $product->stock
    ]);
}

    

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ProductImages;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductImages_controller extends Controller
{
    // gambar +
    public function create(Request $request)
    {
        $product = Products::findOrFail($request->product_id);
        return view('page.productimages.create', compact('product'));
    }

    //simpan si gambar
    public function store(Request $request)
    {
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'image' => 'required|image|mimes:jpg,png,jpeg|max:2048'
    ]);

    if (!$request->hasFile('image')) {
        return back()->with('error', 'File tidak ditemukan');
    }

    $path = $request->file('image')->store('products', 'public');

    // cek image pertama
    $isPrimary = ProductImages::where('product_id', $request->product_id)->count() == 0 ? 1 : 0;

    ProductImages::create([
        'product_id' => $request->product_id,
        'image_url' => $path,
        'is_primary' => $isPrimary
    ]);

    return redirect()->route('products.show', $request->product_id);
}
}
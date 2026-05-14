<?php

namespace App\Http\Controllers;

use App\Models\ProductSize;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsSizes_controller extends Controller
{
    public function create(Request $request)
    {
        $product = Products::findOrFail($request->product_id);
        return view('page.product.productsize.create', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'size_name'  => 'required|string|max:10',
        ]);

        ProductSize::create([
            'product_id' => $request->product_id,
            'size_name'  => $request->size_name,
        ]);

        return redirect()->route('products.show', $request->product_id);
    }
}
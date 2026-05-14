<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductsVariants_controller extends Controller
{
    public function create(Request $request)
    {
        $product = Products::findOrFail($request->product_id);
        return view('page.product.productvariant.create', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'color'      => 'required|string',
            'stock'      => 'required|integer|min:0',
        ]);

    ProductVariant::create([
    'product_id' => $request->product_id,
    'color_name' => $request->color,
    'color_code' => $request->color_code ?? '#000000',
]);

        return redirect()->route('products.show', $request->product_id);
    }
}
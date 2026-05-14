<?php

namespace App\Http\Controllers;

use App\Models\VariantStock;
use Illuminate\Http\Request;

class VariantStock_controller extends Controller
{
    public function create()
    {
        return view('page.product.productvariant.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'variant_id' => 'required',
            'size_id' => 'required',
            'stock' => 'required',
            'price' => 'required',
        ]);

        VariantStock::create([
            'variant_id' => $request->variant_id,
            'size_id' => $request->size_id,
            'stock' => $request->stock,
            'price' => $request->price,
        ]);

        return redirect()->back()->with('success', 'Stock added successfully');
    }
}
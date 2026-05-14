<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class Products_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Products::all();
        $brand = Brands::all();
        return view('page.product.index')->with([
    'data' => $data,
    'brand' => $brand
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

                $Brands = Brands::all();
                $Category = Categories::all();
                return view ('page.product.create')->with([
    'Brands' => $Brands,
    'Category' => $Category
                 ]);
    }

    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
{
    $request->validate([
        'brand_id' => 'required|integer',
        'category_id' => 'required|integer',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'base_price' => 'required|numeric',
    ]);

    Products::create([
        'brand_id' => $request->brand_id,
        'category_id' => $request->category_id,
        'name' => $request->name,
        'description' => $request->description,
        'base_price' => $request->base_price,
        'is_active' => $request->has('is_active') ? 1 : 0,
    ]);

    return redirect()->route('products.index');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $product = Products::with([
        'brand',
        'category'
    ])->findOrFail($id);

    return view('page.product.detail', compact('product'));
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
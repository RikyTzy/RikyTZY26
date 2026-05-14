<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class Categories_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = Categories::all();
        return view('page.categories.index')->with([
    'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view ('page.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $data = [
            'name' => $request->input('name'),
        ];

        Categories::create($data);

        return redirect()
            ->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
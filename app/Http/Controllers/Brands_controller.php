<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;

class Brands_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = Brands::all();
        return view('page.brand.index')->with([
    'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('page.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $kode = date('YmdHis');
        if ($request->hasFile('logo')) {
            $logoFile = $request->file('logo');
            $logoFileName = $kode . '.'. $logoFile->extension();
            $logoFilePath = $logoFile->move(public_path('logo'), $logoFileName);
            $logoFilePath = $logoFileName;
        } else {
            return redirect()->back()->with('error', 'Logo tidak ditemukan');
        }

        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'logo' => $logoFilePath,
        ];

        Brands::create($data);

        return redirect()
            ->route('Brands.index');
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
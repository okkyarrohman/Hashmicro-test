<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = DB::table('products')->get();

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'stock' => 'required|integer',
        ]);

        $storedData = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock')
        ];

        DB::table('products')->insert($storedData);

        return redirect()->route('products.index')->with('success', 'Product Created');
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
        $product = DB::table('products')->where('id', $id)->first();


        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $productQuery = DB::table('products')
            ->where('id', $id);

        $product = $productQuery->first();

        $updatedData = [
            'name' => $request->input('name', $product->name),
            'price' => $request->input('price', $product->price),
            'stock' => $request->input('stock', $product->stock)
        ];

        $productQuery->update($updatedData);

        return redirect()->route('products.index')->with('success', 'Product updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = DB::table('products')->where('id', $id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product Deleted');
    }
}

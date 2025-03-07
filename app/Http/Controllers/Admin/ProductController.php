<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class ProductController extends Controller
{
    protected $productService;


    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index(Request $request)
    {
        $product = $this->productService->index($request);

        return view('admin.product.index', [
            'products' => $product['data']
        ]);
    }

    public function exportPdf(Request $request)
    {
        // dd(1);
        $products = $this->productService->index($request);

        $pdf = Pdf::loadView('admin.product.pdf', [
            'products' => $products['data'],
        ]);

        return $pdf->download('product-list.pdf');
    }

    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->productService->store($request);

        return redirect()->route('products.index')->with('success', 'Product Created');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = $this->productService->show($id);


        return view('admin.product.edit', [
            'product' => $product['data']
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->productService->update($request, $id);

        return redirect()->route('products.index')->with('success', 'Product updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->productService->destroy($id);
        return redirect()->route('products.index')->with('success', 'Product Deleted');
    }
}

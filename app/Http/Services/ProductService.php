<?php

namespace App\Http\Services;

use App\Http\Repository\ProductRepository;
use Illuminate\Support\Facades\Auth;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    public function index($request)
    {
        $products = $this->productRepository->getAllWithRelation()->paginate(10);

        $formattedData = [];

        foreach ($products as $product) {
            $formattedData[] = [
                'merchantName' => $product->merchantName,
                'email' => $product->email,
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'stock' => $product->stock
            ];
        }

        return [
            'data' => $formattedData
        ];
    }

    public function store($request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'stock' => 'required|integer',
        ]);

        $data = [
            'merchant_id' => Auth::id(),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock')
        ];


        $this->productRepository->store($data);
    }


    public function show($id)
    {
        $product = $this->productRepository->getByIdWithRelation($id);


        $formattedData = [
            'merchantName' => $product->merchantName,
            'email' => $product->email,
            'product_id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'stock' => $product->stock
        ];

        return [
            'data' => $formattedData
        ];
    }

    public function update($request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $product = $this->productRepository->getByIdWithRelation($id);

        $updatedData = [
            'merchant_id' => Auth::id(),
            'name' => $request->input('name', $product->name),
            'price' => $request->input('price', $product->price),
            'stock' => $request->input('stock', $product->stock)
        ];

        $this->productRepository->update($id, $updatedData);
    }


    public function destroy($id)
    {
        $this->productRepository->destroy($id);
    }
}

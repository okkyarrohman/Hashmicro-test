<?php

namespace App\Http\Services;

use App\Http\Repository\DetailOrderRepository;
use App\Http\Repository\OrderRepository;
use App\Http\Repository\ProductRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderService
{
    protected $orderRepository;
    protected $detailOrderRepository;

    protected $productRepository;


    public function __construct(
        OrderRepository $orderRepository,
        DetailOrderRepository $detailOrderRepository,
        ProductRepository $productRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->detailOrderRepository = $detailOrderRepository;
        $this->productRepository = $productRepository;
    }


    public function store($request)
    {

        try {
            $request->validate([
                'product_ids' => 'required|array',
                'product_ids.*' => 'exists:products,id',
                'quantities' => 'required|array',
                'quantities.*' => 'integer|min:1',
            ]);

            $products = $this->productRepository->getWhereInId($request->input('product_ids'));

            if (!$products) {

                return [
                    'error' => 'Tidak ada product dengan ID tersebut',
                ];
            }

            $totalPrice = 0;
            foreach ($products as $product) {
                $quantity = $request->quantities[$product->id];

                if ($product->stock <= 0) {
                    return [
                        'error' => "Produk {$product->name} sudah habis (stok 0).",
                    ];
                }

                if ($quantity > $product->stock) {
                    $errors["quantities.{$product->id}"] = "Jumlah pesanan untuk {$product->name} tidak boleh melebihi stok ({$product->stock}).";
                }

                $totalPrice += $product->price * $quantity;
            }


            if (!empty($errors)) {
                return [
                    'error' => $errors,
                ];
            }


            $storedOrder = [
                'customer_id' => Auth::id(),
                'typePayment_id' => 1,
                'coupon_id' => 1,
                'discount' => 0,
                'tax' => 0,
                'price' => $totalPrice,
                'total_price' => $totalPrice,
                'status' => 'UNPAID',
                'created_at' => Carbon::now()
            ];

            $orderId = $this->orderRepository->storeGetId($storedOrder);

            foreach ($products as $product) {

                $storedDetail = [
                    'order_id' => $orderId,
                    'product_id' => $product->id,
                    'quantity' => $request->quantities[$product->id],
                    'price' => $product->price,
                    'created_at' => Carbon::now()
                ];

                $this->detailOrderRepository->store($storedDetail);
                $this->productRepository->updateStock($product->id, $product->stock - $quantity);
            }
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
            ];
        }

        return [
            'orderId' => $orderId,
            'success' => true
        ];
    }
}

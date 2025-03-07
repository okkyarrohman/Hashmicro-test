<?php

namespace App\Http\Services;

use App\Http\Repository\OrderRepository;
use Illuminate\Support\Facades\Auth;

class TransactionService
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }


    public function index($request)
    {
        $user = Auth::user();
        $customer = $user->hasRole('customer');


        $transactions = $this->orderRepository->getAllOrder($customer);

        $formattedData = [];

        foreach ($transactions as $transaction) {
            if (!isset($formattedData[$transaction->id])) {
                $formattedData[$transaction->id] = [
                    'orderId'      => $transaction->id,
                    'customerName' => $transaction->customerName,
                    'customerEmail' => $transaction->customerEmail,
                    'products'     => [], // Buat array kosong untuk produk
                    'totalPrice'   => $transaction->total_price
                ];
            }

            // Tambahkan produk ke dalam array products
            $formattedData[$transaction->id]['products'][] = $transaction->productName;
        }

        // Ubah associative array ke indexed array
        return [
            'data' => array_values($formattedData)
        ];
    }
}

<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;

class TripayService

{
    protected $apiKey;
    protected $privateKey;
    protected $apiUrl;

    public function __construct()
    {
        $this->apiKey = env('TRIPAY_API_KEY');
        $this->privateKey = env('TRIPAY_PRIVATE_KEY');
        $this->apiUrl = 'https://tripay.co.id/api/transaction/create';
    }

    public function createTransaction($orderId, $paymentCode, $totalPrice, $customer, $orderItems)
    {
        $merchantRef = 'INV-' . time(); // Kode unik transaksi

        $payload = [
            'method'         => $paymentCode,
            'merchant_ref'   => $orderId,
            'amount'         => $totalPrice,
            'customer_name'  => $customer->name,
            'customer_email' => $customer->email,
            'customer_phone' => $customer->phone ?? '-',
            'order_items'    => $orderItems,
            'callback_url'   => url('/api/tripay/callback'),
            'return_url'     => url('/order/success'),
            'expired_time'   => time() + (24 * 60 * 60), // Expired dalam 24 jam
            'signature'      => hash_hmac('sha256', $merchantRef . $totalPrice, $this->privateKey),
        ];

        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->apiKey}"
        ])->post($this->apiUrl, $payload);

        return $response->json();
    }
}

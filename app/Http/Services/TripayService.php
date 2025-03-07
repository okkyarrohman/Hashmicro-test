<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;

class TripayService

{
    protected $apiKey;
    protected $privateKey;
    protected $apiUrl;

    protected $merchantCode;

    public function __construct()
    {
        $this->apiKey = env('TRIPAY_API_KEY');
        $this->privateKey = env('TRIPAY_PRIVATE_KEY');
        $this->merchantCode = env('TRIPAY_MERCHANT_CODE');
        $this->apiUrl = 'https://tripay.co.id/api-sandbox/transaction/create';
    }

    public function createTransaction($orderId, $paymentCode, $totalPrice, $customer, $orderItems)
    {
        $data = $this->merchantCode . $paymentCode . $orderId;
        dd($data);

        $signature = hash_hmac('sha256', $data, '9IsL8-wLR74-Go3s5-E94pc-iAQts');


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
            'signature'      => $signature,
        ];

        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->apiKey}"
        ])->post($this->apiUrl, $payload);

        return $response->json();
    }
}

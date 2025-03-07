<?php

namespace App\Http\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

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
        $expiredTime = Carbon::now()->addHour()->timestamp;

        $payload = [
            'method'         => $paymentCode, // Contoh: BCAVA, BRIVA, dll.
            'merchant_ref'   => $orderId,     // Ini harus sesuai dengan yang di-sign
            'amount'         => $totalPrice,  // Tidak perlu masuk dalam signature
            'customer_name'  => $customer->name,
            'customer_email' => $customer->email,
            'customer_phone' => $customer->phone ?? '-',
            'order_items'    => $orderItems,
            'callback_url'   => url('/api/tripay/callback'),
            'return_url'     => url("/customer/orders/$orderId"),
            'expired_time'   => $expiredTime,
            'signature'    => hash_hmac('sha256', $this->merchantCode . $orderId . $totalPrice, $this->privateKey)
        ];



        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->apiKey}"
        ])->post($this->apiUrl, $payload);

        return $response->json();
    }
}

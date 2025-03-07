<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;

class OrderRepository
{

    public function getAllOrder($customer)
    {
        return DB::table('detail_orders')
            ->join('orders', 'detail_orders.order_id', '=', 'orders.id')
            ->join('products', 'detail_orders.product_id', '=', 'products.id')
            ->join('users', 'orders.customer_id', '=', 'users.id')
            ->select(
                'orders.*',
                'products.name as productName',
                'users.name as customerName',
                'users.email as customerEmail'
            )
            ->when($customer, function ($query, $customer) {
                return $query->where('orders.customer_id', $customer);
            })
            ->paginate(10);
    }


    public function storeGetId(array $data)
    {
        return DB::table('orders')->insertGetId($data);
    }

    public function updateTax($amount, $orderId)
    {
        DB::table('orders')->where('id', $orderId)
            ->update([
                'tax' => $amount
            ]);
    }

    public function updatedExpired($expiredAt, $orderId)
    {
        DB::table('orders')->where('id', $orderId)
            ->update([
                'expired_at' => $expiredAt
            ]);
    }


    public function getById($orderId)
    {

        return DB::table('orders')
            ->where('orders.id', $orderId)
            ->select('orders.*')
            ->first(); // Gunakan first() agar hasilnya objek, bukan array

    }
}

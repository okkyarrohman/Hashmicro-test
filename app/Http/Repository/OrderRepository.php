<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;

class OrderRepository
{

    public function getAllOrderByCustomer($customerId)
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
            ->where('orders.customer_id', $customerId)
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
}

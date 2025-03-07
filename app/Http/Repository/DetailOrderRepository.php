<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;

class DetailOrderRepository
{
    public function store(array $data)
    {
        DB::table('detail_orders')->insert($data);
    }

    public function getByOrderId($orderId)
    {
        return DB::table('detail_orders')
            ->join('products', 'detail_orders.product_id', '=', 'products.id')
            ->where('detail_orders.order_id', $orderId)
            ->select('detail_orders.*', 'products.name as product_name')
            ->get();
    }
}

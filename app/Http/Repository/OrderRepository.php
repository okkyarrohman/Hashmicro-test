<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;

class OrderRepository
{
    public function storeGetId(array $data)
    {
        return DB::table('orders')->insertGetId($data);
    }
}

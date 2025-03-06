<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;

class DetailOrderRepository
{
    public function store(array $data)
    {
        DB::table('detail_orders')->insert($data);
    }
}

<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;


class ProductRepository
{
    public function getAllWithRelation()
    {
        return DB::table('products')
            ->join('users', 'products.merchant_id', '=', 'users.id')
            ->select(
                'products.*',
                'users.id as user_id',
                'users.name as merchantName',
                'users.email',

            );
    }

    public function updateStock($id, $newStock)
    {
        DB::table('products')->where('id', $id)->update([
            'stock' => $newStock
        ]);
    }


    public function getWhereInId(array $ids)
    {
        return DB::table('products')
            ->whereIn('id', $ids)
            ->get();
    }

    public function getByIdWithRelation($id)
    {
        return DB::table('products')
            ->join('users', 'products.merchant_id', '=', 'users.id')
            ->select(
                'products.*',
                'users.id as user_id',
                'users.name as merchantName',
                'users.email',
            )
            ->where('products.id', $id)
            ->first();
    }

    public function store(array $data)
    {
        DB::table('products')->insert($data);
    }


    public function update($id, array $data)
    {
        DB::table('products')
            ->where('id', $id)->update($data);
    }

    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();
    }
}

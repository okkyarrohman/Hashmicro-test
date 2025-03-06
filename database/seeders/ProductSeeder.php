<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'pizza',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore commodi non pariatur nulla ad aperiam similique impedit repellendus? Soluta porro ducimus illum vel voluptatum possimus, dicta ipsam deserunt quis dolore ab dolorum, harum dignissimos error eos eligendi perferendis asperiores dolores. Facere, sequi rem, nulla adipisci quam culpa quia maxime quos distinctio optio iusto cum quibusdam esse officia itaque laudantium excepturi. Eligendi atque ex accusantium corporis aspernatur, iure maiores inventore quaerat. Non et ipsam saepe aspernatur earum. Voluptatibus, dolorum repudiandae? Tenetur vero blanditiis architecto? Officia, totam! Non voluptatum qui voluptates ipsa harum quod saepe provident, architecto illum sapiente dicta atque dolor.',
                'price' => 40000,
                'stock' => 10
            ],
            [
                'name' => 'donat',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore commodi non pariatur nulla ad aperiam similique impedit repellendus? Soluta porro ducimus illum vel voluptatum possimus, dicta ipsam deserunt quis dolore ab dolorum, harum dignissimos error eos eligendi perferendis asperiores dolores. Facere, sequi rem, nulla adipisci quam culpa quia maxime quos distinctio optio iusto cum quibusdam esse officia itaque laudantium excepturi. Eligendi atque ex accusantium corporis aspernatur, iure maiores inventore quaerat. Non et ipsam saepe aspernatur earum. Voluptatibus, dolorum repudiandae? Tenetur vero blanditiis architecto? Officia, totam! Non voluptatum qui voluptates ipsa harum quod saepe provident, architecto illum sapiente dicta atque dolor.',
                'price' => 10000,
                'stock' => 20
            ],
            [
                'name' => 'burger',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore commodi non pariatur nulla ad aperiam similique impedit repellendus? Soluta porro ducimus illum vel voluptatum possimus, dicta ipsam deserunt quis dolore ab dolorum, harum dignissimos error eos eligendi perferendis asperiores dolores. Facere, sequi rem, nulla adipisci quam culpa quia maxime quos distinctio optio iusto cum quibusdam esse officia itaque laudantium excepturi. Eligendi atque ex accusantium corporis aspernatur, iure maiores inventore quaerat. Non et ipsam saepe aspernatur earum. Voluptatibus, dolorum repudiandae? Tenetur vero blanditiis architecto? Officia, totam! Non voluptatum qui voluptates ipsa harum quod saepe provident, architecto illum sapiente dicta atque dolor.',
                'price' => 30000,
                'stock' => 20
            ]
        ];

        foreach ($products as $product) {
            DB::table('products')->insert($product);
        }
    }
}

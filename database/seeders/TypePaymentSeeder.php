<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypePaymentSeeder extends Seeder
{
    public function run()
    {
        DB::table('type_payments')->truncate(); // Menghapus data lama (Opsional)

        DB::table('type_payments')->insert([
            ['id' => 16, 'name' => 'Maybank Virtual Account', 'code' => 'MYBVA'],
            ['id' => 17, 'name' => 'Permata Virtual Account', 'code' => 'PERMATAVA'],
            ['id' => 18, 'name' => 'BNI Virtual Account', 'code' => 'BNIVA'],
            ['id' => 19, 'name' => 'BRI Virtual Account', 'code' => 'BRIVA'],
            ['id' => 20, 'name' => 'Mandiri Virtual Account', 'code' => 'MANDIRIVA'],
            ['id' => 21, 'name' => 'BCA Virtual Account', 'code' => 'BCAVA'],
            ['id' => 22, 'name' => 'Muamalat Virtual Account', 'code' => 'MUAMALATVA'],
            ['id' => 23, 'name' => 'CIMB Niaga Virtual Account', 'code' => 'CIMBVA'],
            ['id' => 24, 'name' => 'BSI Virtual Account', 'code' => 'BSIVA'],
            ['id' => 25, 'name' => 'OCBC NISP Virtual Account', 'code' => 'OCBCVA'],
            ['id' => 26, 'name' => 'Danamon Virtual Account', 'code' => 'DANAMONVA'],
            ['id' => 27, 'name' => 'Other Bank Virtual Account', 'code' => 'OTHERBANKVA'],
            ['id' => 28, 'name' => 'Alfamart', 'code' => 'ALFAMART'],
            ['id' => 29, 'name' => 'Indomaret', 'code' => 'INDOMARET'],
            ['id' => 30, 'name' => 'Alfamidi', 'code' => 'ALFAMIDI'],
            ['id' => 31, 'name' => 'OVO', 'code' => 'OVO'],
            ['id' => 32, 'name' => 'QRIS by ShopeePay', 'code' => 'QRIS'],
            ['id' => 35, 'name' => 'DANA', 'code' => 'DANA'],
            ['id' => 36, 'name' => 'ShopeePay', 'code' => 'SHOPEEPAY']
        ]);
    }
}

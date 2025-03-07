<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('typePayment_id');
            $table->unsignedBigInteger('coupon_id');
            $table->integer('discount')->default(0);
            $table->integer('tax')->default(0);
            $table->integer('price');
            $table->integer('total_price');
            $table->enum('status', ['PAID', 'FAILED', 'EXPIRED', 'UNPAID']);
            $table->dateTime('paid_at')->nullable();
            $table->bigInteger('expired_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

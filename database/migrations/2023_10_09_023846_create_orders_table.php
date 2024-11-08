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
            $table->timestamps();
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->integer('total');
            $table->string('payment_method');
            $table->string('delivery_method');
            $table->string('momo_name');
            $table->string('momo_number');
            $table->string('customer_name');
            $table->string('customer_number');
            $table->string('location');
            $table->string('date');
            $table->tinyInteger('cancelled');
            $table->tinyInteger('shipped');
            $table->string('order_sn');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('suborder_id');  // items ordered in the same order will share the same suborder_id
            $table->uuid('customer_id');
            $table->uuid('sub_product_id');
            $table->uuid('customer_daily_prices_id');   // price of the item AT THE TIME the order was made
            $table->decimal('quantity', 10, 2);
            $table->integer('status')->default(0); // 0: pending, 1: completed, 2: cancelled
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_orders');
    }
};

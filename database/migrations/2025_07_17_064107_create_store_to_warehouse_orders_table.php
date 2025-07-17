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
        Schema::create('store_to_warehouse_orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('store_id');
            $table->string('warehouse_id');
            $table->string('suborder_id');  // items ordered in the same order will share the same suborder_id
            $table->uuid('sub_product_id');
            $table->uuid('warehouse_daily_prices_id');  // price of the item AT THE TIME the order was made
            $table->decimal('quantity', 10, 2);
            $table->integer('status')->default(0); // 0: pending for a warehouse, 1: accepted by that warehouse, 2: rejected by that warehouse (if rejected, another new entry will be made for a different alloted warehouse), 3: cancelled by the store
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_to_warehouse_orders');
    }
};

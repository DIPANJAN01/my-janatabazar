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
        Schema::create('warehouse_to_warehouse_orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('by_warehouse_id');  // warehouse making the order
            $table->string('to_warehouse_id');  // warehouse receiving the order request
            $table->string('suborder_id');  // items ordered in the same order will share the same suborder_id
            $table->uuid('sub_product_id');
            $table->uuid('warehouse_daily_prices_id');  // price of the item AT THE TIME the order was made
            $table->decimal('quantity_requested', 10, 2);
            $table->decimal('quantity_provided', 10, 2);
            $table->integer('status')->default(0); // 0: pending for a to_warehouse, 1: accepted by that warehouse, 2: rejected by that warehouse (if rejected, another new entry will be made for a different alloted to_warehouse), 3: cancelled by the by_warehouse
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse_to_warehouse_orders');
    }
};

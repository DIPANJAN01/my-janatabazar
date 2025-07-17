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
        Schema::create('warehouse_daily_prices', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('warehouse_id');   //incase we ever want to know which warehouse set that price
            $table->uuid('sub_product_id');
            $table->string('unit_slug');
            $table->decimal('unit_price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse_daily_prices');
    }
};

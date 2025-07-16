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
        Schema::create('sub_products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->uuid('product_id')->nullable();
            $table->uuid('category_id')->nullable();
            $table->string('variant')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->uuid('deleted_by')->nullable();
            $table->softDeletes('deleted_at', precision: 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_products');
    }
};

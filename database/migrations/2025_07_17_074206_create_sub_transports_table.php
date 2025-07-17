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
        Schema::create('sub_transports', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('transport_id');
            $table->uuid('order_id');
            $table->uuid('suborder_id');  // useful to keep it here for easier referencing instead of having to go to the order table everytime for it
            $table->string('from_type')->default('warehouse');
            $table->uuid('from_type_id');
            $table->string('to_type');  // store or warehouse
            $table->uuid('to_type_id');
            $table->integer('status')->default(0);  // 0=pending for driver, 1=driver accepted to deliver, 2=picked up by driver, 3=delivered by driver, 4=rejected by driver
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transports');
    }
};

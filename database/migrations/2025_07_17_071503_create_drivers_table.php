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
        Schema::create('drivers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('vehicle_types_ids');  //types of vehicles he has access to (separated by commas)
            $table->string('full_name');
            $table->string('mobile_no');
            $table->string('alternate_mobile_no')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->nullable();
            $table->string('driving_license_number')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transport_drivers');
    }
};

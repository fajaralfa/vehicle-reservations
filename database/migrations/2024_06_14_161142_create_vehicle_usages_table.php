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
        Schema::create('vehicle_usages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_reservation_id');
            $table->unsignedInteger('distance');
            $table->unsignedInteger('fuel_usage');
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->timestamps();
            $table->foreign('vehicle_reservation_id')->on('vehicle_reservations')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_usages');
    }
};

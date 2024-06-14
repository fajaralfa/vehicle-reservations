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
        Schema::create('rented_vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id')->unique();
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->timestamps();
            $table->foreign('vehicle_id')->on('vehicles')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rented_vehicles');
    }
};

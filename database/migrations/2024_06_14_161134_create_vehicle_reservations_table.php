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
        Schema::create('vehicle_reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_driver_id')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->unsignedBigInteger('approver_id')->nullable();
            $table->unsignedBigInteger('orderer_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->boolean('is_approved')->nullable();
            $table->timestamp('approved_date')->nullable();
            $table->timestamps();
            $table->foreign('vehicle_driver_id')->on('vehicle_drivers')->references('id');
            $table->foreign('admin_id')->on('admins')->references('id');
            $table->foreign('approver_id')->on('employees')->references('id');
            $table->foreign('orderer_id')->on('employees')->references('id');
            $table->foreign('vehicle_id')->on('vehicles')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_reservations');
    }
};
